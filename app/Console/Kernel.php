<?php

namespace App\Console;

use App\Console\Commands\ServeCommand;

class Kernel
{
    public static array $register = [
        ServeCommand::class
    ];
}
