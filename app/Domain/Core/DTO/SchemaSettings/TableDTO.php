<?php

namespace App\Domain\Core\DTO\SchemaSettings;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class TableDTO extends Data
{
    public function __construct(
        public string $uid,
        public SettingsDTO $settings,
        /** @var MetadataDTO[] */
        public array $metadatas,
        /** @var string[] */
        public array $layoutsList,
        /** @var LayoutNameSizeDTO[][] */
        public array $layoutsEdit,
        public bool $isComponent,
    )
    {
    }
}
