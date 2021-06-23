<?php

namespace DoeAnderson\RedirectTrailingSlash;

use DoeAnderson\RedirectTrailingSlash\Http\Middleware\RedirectTrailingSlash;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class RedirectTrailingSlashServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', RedirectTrailingSlash::class);
    }
}
