<?php

namespace App\Http\Middleware;

use App\Kernel\Core\Middleware\Middleware;

class Kernel extends Middleware
{
    protected static array $aliases = [
        'test' => TestMiddleware::class
    ];
}
