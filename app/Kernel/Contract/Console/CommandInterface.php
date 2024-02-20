<?php

namespace App\Kernel\Contract\Console;

interface CommandInterface
{
    /**
     * Execute the command.
     *
     * @return void
     */
    public static function handle(): void;
}
