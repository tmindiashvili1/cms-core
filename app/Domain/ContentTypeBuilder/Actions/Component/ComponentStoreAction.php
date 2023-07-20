<?php

namespace App\Domain\ContentTypeBuilder\Actions\Component;

use App\Domain\ContentTypeBuilder\DTO\Components\ComponentStoreDTO;
use App\Domain\Core\DTO\Schema\AttributeDTO;
use App\Domain\Core\DTO\SchemaSettings\LayoutNameSizeDTO;
use App\Domain\Core\DTO\SchemaSettings\MetadataDTO;
use App\Domain\Core\DTO\SchemaSettings\SettingDTO;
use App\Domain\Core\DTO\SchemaSettings\SettingsDTO;
use App\Domain\Core\Models\StoreSetting;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComponentStoreAction
{

    public function handle(ComponentStoreDTO $componentStoreDTO)
    {
        /** @var AttributeDTO $firstAttribute */
        $firstAttribute = $componentStoreDTO->attributes->first();

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
            ],$componentStoreDTO->attributes->each(function (AttributeDTO $attributeDTO) {
                return $attributeDTO->getFieldName();
            })->toArray()),
            'layoutsEdit' => LayoutNameSizeDTO::collection(
                $componentStoreDTO->attributes->each(function (AttributeDTO $attributeDTO) {
                    return [
                        'name' => $attributeDTO->name,
                        'size' => 12
                    ];
                })->toArray()
            ),
            'isComponent' => true
        ]);

        StoreSetting::updateOrCreate([
            'key' => $componentStoreDTO->getKey(),
        ],[
            'value' => $dto,
        ]);

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
