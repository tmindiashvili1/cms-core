<?php

namespace App\Domain\Core\DTO\DatabaseSchema;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class TableSchemaDTO extends Data
{
    public function __construct(
        public string $name,
        /** @var ColumnSchemaDTO[] */
        #[DataCollectionOf(ColumnSchemaDTO::class)]
        public DataCollection $columns,
        /** @var IndexSchemaDTO[] */
        #[DataCollectionOf(IndexSchemaDTO::class)]
        public ?DataCollection $indexes,
        /** @var ForeignKeySchemaDTO[] */
        #[DataCollectionOf(ForeignKeySchemaDTO::class)]
        public ?DataCollection $foreignKeys,
    )
    {
    }
}
