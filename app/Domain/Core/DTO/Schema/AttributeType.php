<?php

namespace App\Domain\Core\DTO\Schema;

enum AttributeType: string
{
    case STRING = 'string';
    case MEDIA = 'media';
    case COMPONENT = 'component';

    public function isDatabaseColumnType()
    {
        return in_array($this->value,['string']);
    }
}
