<?php

namespace App\Console\Commands;

use App\Kernel\Contract\Console\CommandInterface;

class DbUpCommand implements CommandInterface
{
    public static string $command = "db:up";
    public static string $description = "Create tables";
    public static function handle(): void
    {
        $migrations = getMigrations();
        foreach ($migrations as $migration) {
            $migration::up();
        }
    }
}
