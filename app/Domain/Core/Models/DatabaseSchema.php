<?php

namespace App\Domain\Core\Models;

use App\Domain\Core\DTO\DatabaseSchema\TableSchemaDTO;
use App\Domain\Core\DTO\SchemaSettings\SettingDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatabaseSchema extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'cms_core_database_schemas';

    /**
     * @var string[]
     */
    protected $fillable = [
        'table_name',
        'schema'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'deleted_at' => 'datetime',
        'schema' => TableSchemaDTO::class,
    ];

}

