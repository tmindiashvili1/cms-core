<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreSetting extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'cms_core_store_settings';

    /**
     * @var string[]
     */
    protected $fillable = [
        'key',
        'value'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'deleted_at' => 'datetime',
        'value' => 'json',
    ];

}
