<?php

namespace App\Domain\Core\DTO\SchemaSettings;

use App\Domain\Core\DTO\Schema\AttributeDTO;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class SettingDTO extends Data
{
    public function __construct(
        public string $uid,
        public SettingsDTO $settings,
        #[DataCollectionOf(MetadataDTO::class)]
        public ?DataCollection $metadatas,
        /** @var string[] */
        public array $layoutsList,
        #[DataCollectionOf(LayoutNameSizeDTO::class)]
        public DataCollection $layoutsEdit,
        public bool $isComponent,
    )
    {
    }
}
