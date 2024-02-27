<?php

namespace App\Kernel\Core\Middleware;

abstract class Middleware
{
    protected static array $aliases = [];

    public static function handle(string $alias)
    {
        if (!array_key_exists($alias, static::$aliases)) {
            throw new \Exception("Undefined middleware alias '{$alias}'");
        }
        $middleware = static::$aliases[$alias];
        (new $middleware)->handle();
    }
}
