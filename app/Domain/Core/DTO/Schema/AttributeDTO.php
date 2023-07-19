<?php

namespace App\Domain\Core\DTO\Schema;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class AttributeDTO extends Data
{
    public function __construct(
        public string $type,
        public bool $required,
        public ?int $maxLength,
        public ?string $default,
        public ?bool $multiple,
        /** @var string[] */
        public ?array $allowedTypes,
        public ?string $relation,
        public ?string $target,
    )
    {

    }

}
