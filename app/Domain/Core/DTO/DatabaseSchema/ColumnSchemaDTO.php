<?php

namespace App\Domain\Core\DTO\DatabaseSchema;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class ColumnSchemaDTO extends Data
{
    /**
     * @param string $name
     * @param string $type
     * @param bool $unsigned
     * @param bool $notNullable
     * @param $defaultTo
     * @param array $args
     */
    public function __construct(
        public string $name,
        public string $type,
        public bool $unsigned,
        public bool $notNullable,
        public $defaultTo,
        public array $args,
    )
    {
    }

}
