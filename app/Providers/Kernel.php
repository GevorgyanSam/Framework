<?php

namespace App\Providers;

use App\Kernel\Core\Providers\Provider;

class Kernel extends Provider
{
    protected static array $providers = [
        RouteServiceProvider::class
    ];
}
