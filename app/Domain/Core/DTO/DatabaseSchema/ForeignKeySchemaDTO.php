<?php

namespace App\Domain\Core\DTO\DatabaseSchema;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class ForeignKeySchemaDTO extends Data
{
    /**
     * @param string $name
     * @param array $columns
     * @param string $onDelete
     * @param string $referencedTable
     * @param array $referencedColumns
     */
    public function __construct(
        public string $name,
        /** @var string[] */
        public array $columns,
        public string $onDelete,
        public string $referencedTable,
        /** @var string[] */
        public array $referencedColumns,
    )
    {
    }
}
