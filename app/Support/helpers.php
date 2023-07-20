<?php

/**
 * Return the path to the given module file.
 *
 * @param  string  $slug
 * @param  string  $file
 * @param  string|null  $location
 * @return string
 */
function domain_path($slug = null, $file = '')
{
    $modulesPath = app_path('Domain');

    $filePath = $file ? '/'.ltrim($file, '/') : '';

    if (is_null($slug)) {
        if (empty($file)) {
            return $modulesPath;
        }

        return $modulesPath.$filePath;
    }

    return $modulesPath.'/'.Str::ucfirst($slug).$filePath;
}
