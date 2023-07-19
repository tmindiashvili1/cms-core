<?php

namespace App\Domain\CMS\DTO\Components;

use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
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
        public ?string $icon = ''
    )
    {
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return config('cms.component.setting_base_key') . Str::kebab(Str::lower($this->name));
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return generateComponentTableName($this->name, $this->categoryName);
    }

}
