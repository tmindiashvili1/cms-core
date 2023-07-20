<?php

namespace App\Domain\ContentTypeBuilder\Actions\Component;

use App\Domain\ContentTypeBuilder\DTO\Components\ComponentStoreDTO;
use App\Domain\Core\DTO\DatabaseSchema\ColumnSchemaDTO;
use App\Domain\Core\DTO\DatabaseSchema\TableSchemaDTO;
use App\Domain\Core\DTO\Schema\AttributeDTO;
use App\Domain\Core\DTO\SchemaSettings\LayoutNameSizeDTO;
use App\Domain\Core\DTO\SchemaSettings\MetadataDTO;
use App\Domain\Core\DTO\SchemaSettings\SettingDTO;
use App\Domain\Core\DTO\SchemaSettings\SettingsDTO;
use App\Domain\Core\Models\DatabaseSchema;
use App\Domain\Core\Models\StoreSetting;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ComponentStoreAction
{

    public function handle(ComponentStoreDTO $componentStoreDTO)
    {
        /** @var AttributeDTO $firstAttribute */
        $firstAttribute = $componentStoreDTO->attributes->first();

//        dd($componentStoreDTO->attributes->toCollection()->map(function (AttributeDTO $attributeDTO) {
//            return LayoutNameSizeDTO::from([
//                'name' => $attributeDTO->name,
//                'size' => 12
//            ]);
//        })->toArray());

        $dto = SettingDTO::from([
            'uid' => $componentStoreDTO->getUid(),
            'settings' => SettingsDTO::from([
                'bulkable' => true,
                'filterable' => true,
                'searchable' => true,
                'pageSize' => 10,
                'mainField' => $firstAttribute->getFieldName(),
                'defaultSortBy' => $firstAttribute->name,
                'defaultSortOrder' => 'ASC'
            ]),
            'layoutsList' => array_merge([
                'id'
            ],$componentStoreDTO->attributes->toCollection()->map(function (AttributeDTO $attributeDTO) {
                return $attributeDTO->getFieldName();
            })->toArray()),
            'layoutsEdit' => LayoutNameSizeDTO::collection(
                $componentStoreDTO->attributes->toCollection()->map(function (AttributeDTO $attributeDTO) {
                    return LayoutNameSizeDTO::from([
                        'name' => $attributeDTO->name,
                        'size' => 12
                    ]);
                })->toArray()
            ),
            'isComponent' => true
        ]);

        $schemaDTO = TableSchemaDTO::from([
            'name' => $componentStoreDTO->getTableName(),
            'columns' => array_merge([
                ColumnSchemaDTO::from([
                    'args' => [['primary' => true, 'primaryKey' => true]],
                    'name' => 'id',
                    'type' => 'increments',
                    'unsigned' => false,
                    'defaultTo' => null,
                    'notNullable' => true,
                ]),
            ],$componentStoreDTO->attributes->toCollection()->map(function (AttributeDTO $attributeDTO) {
                return ColumnSchemaDTO::From([
                    'args' => [
                        'maxLength' => $attributeDTO->maxLength,
                    ],
                    'name' => $attributeDTO->getFieldName(),
                    'type' => $attributeDTO->type->value,
                    'unsigned' => false,
                    'defaultTo' => $attributeDTO->default,
                    'notNullable' => $attributeDTO->nullable,
                ]);
            })->toArray()),
        ]);

        DatabaseSchema::updateOrCreate([
            'table_name' => $componentStoreDTO->getTableName(),
        ],[
            'schema' => $schemaDTO,
        ]);

        StoreSetting::updateOrCreate([
            'key' => $componentStoreDTO->getKey(),
        ],[
            'value' => $dto,
        ]);

        $path = app_path('Domain/Component/'.Str::kebab(Str::lower($componentStoreDTO->name)).'/schema.json');
        $directory = dirname($path);
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0775, true);
        }

        File::put($path, $componentStoreDTO->toJson());

        $schemaAction = $componentStoreDTO->existTable() ? 'table' : 'create';

        Schema::$schemaAction($componentStoreDTO->getTableName(), function (Blueprint $table) use($componentStoreDTO) {
            if ($componentStoreDTO->existTable() === false) {
                $table->id();
                $table->timestamps();
                $table->softDeletes();
            }

            /** @var AttributeDTO $attribute */
            foreach($componentStoreDTO->attributes as $attribute) {
                    $table->addColumn($attribute->type->value, $attribute->getFieldName(), [
                        'length' => $attribute->maxLength,
                    ]);
            }
        });

    }

}
