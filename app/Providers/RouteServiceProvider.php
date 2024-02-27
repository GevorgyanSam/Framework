<?php

namespace App\Providers;

use App\Kernel\Contract\Providers\ProviderInterface;

class RouteServiceProvider implements ProviderInterface
{
    public static function boot(): void
    {
        require base_path("routes/web.php");
    }
}
