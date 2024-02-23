<?php

namespace App\Console\Commands;

use App\Kernel\Contract\Console\CommandInterface;
use Database\Seeder\Kernel;

class DbSeedCommand implements CommandInterface
{
    public static string $command = "db:seed";
    public static string $description = "Add fake data to database";

    public static function handle(): void
    {
        $seeders = Kernel::$seeders;
        foreach ($seeders as $class => $count) {
            $factory = $class::factory($count);
            foreach ($factory as $data) {
                $class::create((array) $data);
            }
        }
    }
}
