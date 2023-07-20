<?php

namespace App\Domain\Core\DTO\Schema;

enum SchemaKind: string
{
    case COLLECTION = 'collection';
    case SINGLE = 'single';
    case COMPONENT = 'component';
}
