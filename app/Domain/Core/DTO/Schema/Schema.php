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
        public SchemaKind $kind,
        public InfoDTO $info,
        public OptionsDTO $options,
        /** @var AttributeDTO[] */
        public array $attributes,
        public PluginOptionsDTO $pluginOptions,
    )
    {
    }

}
