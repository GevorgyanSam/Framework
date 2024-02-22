<?php

namespace App\Kernel\Core\Database;

use App\Kernel\Core\Container\Container;
use PDO;
use PDOException;

trait QueryBuilder
{
    protected static array $properties = [];

    /**
     * Establishes a database connection.
     *
     * @return PDO
     */
    protected static function connection(): object
    {
        /* @var PDO $db */
        $db = Container::resolve(Database::class);
        return $db;
    }

    /**
     * Retrieves all records from the table.
     *
     * @return array
     */
    public static function all(): array
    {
        $table = self::$table;
        $statement = self::connection()->prepare("SELECT * FROM $table");
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * Saves the current model instance to the database.
     *
     * @return int|string
     */
    public function save(): int|string
    {
        $table = self::$table;
        $primaryKey = self::$primaryKey;
        $columns = implode(', ', array_keys(self::$properties));
        $values = ':' . implode(', :', array_keys(self::$properties));

        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $statement = self::connection()->prepare($query);

        try {
            $statement->execute(self::$properties);
            return self::last()->$primaryKey;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Retrieves the last record from the table.
     *
     * @return object|bool
     */
    public static function last(): object|bool
    {
        $table = self::$table;
        $primaryKey = self::$primaryKey;
        $statement = self::connection()->prepare("SELECT * FROM $table ORDER BY $primaryKey DESC LIMIT 1");
        $statement->execute();
        return $statement->fetch();
    }

    /**
     * Retrieves the first record from the table.
     *
     * @return object|bool
     */
    public static function first(): object|bool
    {
        $table = self::$table;
        $primaryKey = self::$primaryKey;
        $statement = self::connection()->prepare("SELECT * FROM $table ORDER BY $primaryKey LIMIT 1");
        $statement->execute();
        return $statement->fetch();
    }
}
