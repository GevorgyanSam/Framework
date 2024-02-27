<?php

namespace App\Console;

use App\Console\Commands\DbDownCommand;
use App\Console\Commands\DbSeedCommand;
use App\Console\Commands\DbUpCommand;
use App\Console\Commands\DbRestartCommand;
use App\Console\Commands\ServeCommand;

class Kernel
{
    public static array $register = [
        ServeCommand::class,
        DbUpCommand::class,
        DbDownCommand::class,
        DbRestartCommand::class,
        DbSeedCommand::class
    ];
}
