<?php

namespace App\Kernel\Core\Providers;

abstract class Provider
{
    protected static array $providers = [];

    public static function boot()
    {
        foreach (static::$providers as $provider) {
            $provider::boot();
        }
    }
}
