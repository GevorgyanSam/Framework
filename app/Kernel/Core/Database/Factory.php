<?php

namespace App\Kernel\Core\Database;

use Database\Factory\Kernel;
use Exception;

trait Factory
{
    public static function factory(int $count = 1): object|array
    {
        $model = static::class;
        try {
            if (array_key_exists($model, Kernel::$factories)) {
                if ($count == 1) {
                    return Kernel::$factories[$model]::generate();
                } elseif ($count > 1) {
                    $data = [];
                    for ($i = 0; $i < $count; $i++) {
                        $data[] = Kernel::$factories[$model]::generate();
                    }
                    return $data;
                }
            }
            throw new Exception("Undefined factory for '$model'");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}