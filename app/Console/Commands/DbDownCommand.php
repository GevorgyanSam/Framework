<?php

namespace App\Console\Commands;

use App\Kernel\Contract\Console\CommandInterface;

class DbDownCommand implements CommandInterface
{
    public static string $command = "db:down";
    public static string $description = "Drop tables";
    public static function handle(): void
    {
        $migrations = getMigrations();
        foreach ($migrations as $migration) {
            $migration::down();
        }
    }
}
