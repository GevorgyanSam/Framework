<?php

namespace App\Kernel\Core\Container;

use App\Kernel\Core\Router\Route;
use App\Providers\Kernel;

class Container
{
    private static array $bindings = [];

    public static function singleton(string $name, callable $callable): void
    {
        self::$bindings[$name] = $callable();
    }

    public static function bind(string $name, callable $callable): void
    {
        self::$bindings[$name] = $callable;
    }

    public static function resolve(string $name): object
    {
        if (!array_key_exists($name, self::$bindings)) {
            throw new \InvalidArgumentException("Undefined binding '{$name}'");
        }
        $binding = self::$bindings[$name];
        return is_callable($binding) ? $binding() : $binding;
    }

    public static function build(): void
    {
        self::loadProviders();
        self::loadRoutes();
    }

    private static function loadProviders(): void
    {
        Kernel::boot();
    }

    private static function loadRoutes(): void
    {
        Route::load();
    }
}
