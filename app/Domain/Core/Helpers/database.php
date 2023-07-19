<?php

use Illuminate\Support\Str;

function generateComponentTableName($name, $category) {
    $categoryName = Str::snake(Str::lower(Str::plural($category)));
    $componentName = Str::snake(Str::lower(Str::plural($name)));

    return "{$categoryName}_{$categoryName}_$componentName";
}
