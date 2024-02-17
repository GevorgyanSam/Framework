<?php

namespace App\Kernel\Core\Container;

use App\Kernel\Core\Router\Route;
use App\Providers\Kernel;

class Container
{
    public static function loadProviders()
    {
        Kernel::boot();
    }

    public static function loadRoutes()
    {
        Route::load();
    }
}
