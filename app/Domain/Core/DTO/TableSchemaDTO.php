<?php

namespace App\Domain\Core\DTO;

use Spatie\LaravelData\Data;

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
