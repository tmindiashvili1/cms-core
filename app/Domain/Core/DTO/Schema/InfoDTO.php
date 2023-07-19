<?php

namespace App\Domain\Core\DTO\Schema;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class InfoDTO extends Data
{
    public function __construct(
        public string $displayName,
        public string $icon,
        public string $description,
    )
    {

    }

}
