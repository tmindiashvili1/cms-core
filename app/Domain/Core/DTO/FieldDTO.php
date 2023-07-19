<?php

namespace App\Domain\Core\DTO;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class FieldDTO extends Data
{
    public function __construct()
    {

    }
}
