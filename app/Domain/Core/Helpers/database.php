<?php

use Illuminate\Support\Str;

function generateComponentTableName($name, $category) {
    $categoryName = Str::snake(Str::lower(Str::plural($category)));
    $componentName = Str::snake(Str::lower(Str::plural($name)));
    $baseName = config('cms.component.base_table_name');

    return "{$baseName}_{$categoryName}_$componentName";
}
