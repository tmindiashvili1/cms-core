<?php

namespace App\Domain\ContentTypeBuilder\DTO\Components;

use App\Domain\Core\DTO\DatabaseSchema\ForeignKeySchemaDTO;
use App\Domain\Core\DTO\Schema\AttributeDTO;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class ComponentStoreDTO extends Data
{
    /**
     * @param string $name
     * @param string $categoryName
     * @param string|null $icon
     */
    public function __construct(
        public string $name,
        public string $categoryName,
        #[DataCollectionOf(AttributeDTO::class)]
        public DataCollection $attributes,
        public ?string $icon = '',
    )
    {
    }

    /**
     * @return string
     */
    public function getUid() : string
    {
        return Str::kebab(Str::lower($this->categoryName)) . '.' . Str::kebab(Str::lower($this->name));
    }

    /**
     * @return string
     */
    public function getKey() : string
    {
        return config('cms.component.setting_base_key') . Str::kebab(Str::lower($this->categoryName)) . '.' . Str::kebab(Str::lower($this->name));
    }

    /**
     * @return string
     */
    public function getTableName() : string
    {
        return generateComponentTableName($this->name, $this->categoryName);
    }

    /**
     * @return bool
     */
    public function existTable() : bool
    {
        return Schema::hasTable($this->getTableName());
    }
}
