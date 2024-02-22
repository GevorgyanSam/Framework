<?php

namespace App\Kernel\Core\Database;

use Database\Factory\Kernel;
use Exception;

abstract class Model
{
    protected static string $primaryKey = 'id';
    protected static string $keyType = 'int';
    protected static array $fillable = [];
    public function __set(string $name, $value): void
    {
        try {
            $table = static::$table;
            if (in_array($name, static::$fillable)) {
                static::$properties[$name] = $value;
            } else {
                throw new Exception("Undefined column '$name' in $table table");
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

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