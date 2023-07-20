<?php

namespace App\Domain\Core\DTO\Schema;

use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class AttributeDTO extends Data
{
    public function __construct(
        public string $name,
        public AttributeType $type,
        public bool $required,
        public ?string $default,
        public ?bool $multiple,
        /** @var string[] */
        public ?array $allowedTypes,
        public ?string $relation,
        public ?string $target,
        public ?PluginOptionsDTO $pluginOptions,
        public ?int $maxLength = 255,
        public bool $private = false,
    )
    {
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return Str::lower(Str::snake($this->name));
    }

}
