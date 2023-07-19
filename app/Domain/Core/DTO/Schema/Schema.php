<?php

namespace App\Domain\Core\DTO\Schema;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class Schema extends Data
{
    public function __construct(
        public string $collectionName,
        public InfoDTO $info,
        public array $options,
        /** @var AttributeDTO[] */
        public array $attributes,
    )
    {

    }

}
