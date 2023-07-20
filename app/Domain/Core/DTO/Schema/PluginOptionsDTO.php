<?php

namespace App\Domain\Core\DTO\Schema;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class PluginOptionsDTO extends Data
{
    public function __construct(
        public I18nDTO $i18n
    )
    {

    }

}
