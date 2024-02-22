<?php

namespace App\Console;

use App\Console\Commands\DbFlushCommand;
use App\Console\Commands\DbUpCommand;
use App\Console\Commands\DbRestartCommand;
use App\Console\Commands\ServeCommand;

class Kernel
{
    public static array $register = [
        ServeCommand::class,
        DbUpCommand::class,
        DbFlushCommand::class,
        DbRestartCommand::class
    ];
}
