<?php

namespace App\Kernel\Core\Database;

use App\Kernel\Core\Container\Container;
use Exception;
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
    public static function save(): int|string
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
     * Saves the provided data to the database.
     *
     * @param array $properties
     * @return int|string
     */
    public static function create(array $properties): int|string
    {
        try {
            $table = static::$table;
            foreach ($properties as $key => $value) {
                if (in_array($key, static::$fillable)) {
                    static::$properties[$key] = $value;
                } else {
                    throw new Exception("Undefined column '$key' in $table table");
                }
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return static::save();
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
