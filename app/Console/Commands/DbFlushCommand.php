<?php

namespace App\Console\Commands;

use App\Kernel\Contract\Console\CommandInterface;

class DbFlushCommand implements CommandInterface
{
    public static string $command = "db:flush";
    public static string $description = "Drop all tables";
    public static function handle(): void
    {
        $migrations = getMigrations();
        foreach ($migrations as $migration) {
            $migration::down();
        }
    }
}
