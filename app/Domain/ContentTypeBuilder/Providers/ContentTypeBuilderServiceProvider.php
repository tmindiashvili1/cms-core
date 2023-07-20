<?php

namespace App\Domain\ContentTypeBuilder\Providers;

use Illuminate\Support\ServiceProvider;

class ContentTypeBuilderServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
    }

    public function register(): void
    {
        $this->app->register(ContentTypeBuilderRouteServiceProvider::class);
    }
}
