<?php

namespace App\Kernel\Core\Console;

use App\Console\Kernel;

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
            $commands = Kernel::$register;
            foreach ($commands as $command) {
                wrap($command::$command, $command::$description);
            }
            return;
        }
        $argument = strtolower(self::$args[1]);
        $commands = Kernel::$register;
        $found = false;
        foreach ($commands as $command) {
            if ($command::$command == $argument) {
                $found = true;
                $command::handle();
            }
        }
        if (!$found) {
            throw new \InvalidArgumentException("Undefined command '{$argument}'");
        }
    }
}
