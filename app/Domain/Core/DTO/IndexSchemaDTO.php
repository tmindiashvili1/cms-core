<?php

namespace App\Domain\Core\DTO;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class IndexSchemaDTO extends Data
{
    /**
     * @param string $name
     * @param array $columns
     */
    public function __construct(
        public string $name,
        /** @var string[] */
        public array $columns,
    )
    {

    }

}
