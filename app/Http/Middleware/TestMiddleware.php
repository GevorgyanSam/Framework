<?php

namespace App\Http\Middleware;

use App\Kernel\Contract\Middleware\MiddlewareInterface;

class TestMiddleware implements MiddlewareInterface
{
    public static function handle(): void
    {
        //
    }
}
