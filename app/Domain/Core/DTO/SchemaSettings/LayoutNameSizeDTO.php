<?php

namespace App\Domain\Core\DTO\SchemaSettings;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class LayoutNameSizeDTO extends Data
{
    public function __construct(
        public string $name,
        public int $size,
    )
    {

    }

}
