<?php

namespace App\Domain\Core\DTO\DatabaseSchema;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class TableSchemaDTO extends Data
{
    public function __construct(
        public string $name,
        /** @var ColumnSchemaDTO[] */
        public array $columns,
        /** @var IndexSchemaDTO[] */
        public array $indexes,
        /** @var ForeignKeySchemaDTO[] */
        public array $foreignKeys,
    )
    {

    }
}
