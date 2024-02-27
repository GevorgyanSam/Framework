<?php

namespace App\Kernel\Core\Database;

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
}