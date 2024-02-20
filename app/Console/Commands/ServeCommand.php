<?php

namespace App\Console\Commands;

use App\Kernel\Contract\Console\CommandInterface;

class ServeCommand implements CommandInterface
{
    public static string $command = "serve";
    public static string $description = "Run PHP built in server";
    public static function handle(): void
    {
        $path = base_path("public");
        $url = env("app_url");
        $command = "/usr/bin/php -S $url -t $path";
        shell_exec($command);
    }
}
