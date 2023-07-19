<?php

namespace App\Domain\Core\DTO\SchemaSettings;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class MetadataDTO extends Data
{
    public function __construct(
        public MetadataEditDTO $edit,
        public MetadataListDTO $list,
    )
    {
    }
}
