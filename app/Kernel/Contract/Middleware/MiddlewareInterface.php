<?php

namespace App\Kernel\Contract\Middleware;

interface MiddlewareInterface
{
    /**
     * Defines the method to handle middleware logic.
     * 
     * @return void
     */
    public static function handle(): void;
}
