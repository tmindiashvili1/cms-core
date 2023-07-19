<?php

namespace App\Domain\Core\DTO\SchemaSettings;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class MetadataEditDTO extends Data
{
    /**
     * @param string $label
     * @param string $description
     * @param string $placeholder
     * @param bool $visible
     * @param bool $editable
     * @param string|null $mainField
     */
    public function __construct(
        public string $label,
        public string $description,
        public string $placeholder,
        public bool $visible,
        public bool $editable,
        public ?string $mainField,
    )
    {

    }

}
