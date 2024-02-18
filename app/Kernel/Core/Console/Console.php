<?php

namespace App\Kernel\Core\Console;

class Console
{
    private static array $args = [];

    public static function handle(array $args): void
    {
        self::$args = $args;
        self::boot();
    }

    private static function boot()
    {
        if (!isset(self::$args[1])) {
            echo "Undefined Command";
            return;
        }
        $argument = strtolower(self::$args[1]);
        if ($argument === "serve") {
            $path = base_path("public");
            $url = env("app_url");
            $command = "/usr/bin/php -S {$url} -t {$path}";
            shell_exec($command);
        }
    }
}
