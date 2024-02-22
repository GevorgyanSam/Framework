<?php

namespace App\Kernel\Core\Database;

use App\Kernel\Core\Container\Container;
use PDO;
use PDOException;

class Schema
{
    public static string $query;

    public static function create(string $table, callable $callable): void
    {
        $columns = $callable();
        self::$query = "CREATE TABLE IF NOT EXISTS $table ($columns);";
        self::exec();
    }

    public static function dropIfExists(string $table): void
    {
        self::$query = "DROP TABLE IF EXISTS $table;";
        self::exec();
    }

    private static function exec()
    {
        /* @var PDO $db */
        $db = Container::resolve(Database::class);
        try {
            $db->exec(self::$query);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}