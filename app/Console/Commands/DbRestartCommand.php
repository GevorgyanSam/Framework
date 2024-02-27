<?php

namespace App\Console\Commands;

use App\Kernel\Contract\Console\CommandInterface;

class DbRestartCommand implements CommandInterface
{
    public static string $command = "db:restart";
    public static string $description = "Drop then create tables";
    public static function handle(): void
    {
        $migrations = getMigrations();
        foreach ($migrations as $migration) {
            $migration::down();
            $migration::up();
        }
    }
}
