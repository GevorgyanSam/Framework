<?php

namespace App\Kernel\Contract\Providers;

interface ProviderInterface
{
    /**
     * Bootstrap the service provider.
     * 
     * @return void
     */
    public static function boot(): void;
}
