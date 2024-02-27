<?php

namespace App\Kernel\Contract\Database;

interface FactoryInterface
{
    public static function generate(): object;
}