<?php

namespace App\Kernel\Core\Database;

class Builder
{
    public static string $query = '';

    public static function query()
    {
        return substr(self::$query, 0, -1);
    }

    public static function id(string $column = 'id', $autoIncrement = true): void
    {
        $increment = $autoIncrement ? "AUTO_INCREMENT" : "";
        self::$query .= "$column INT $increment PRIMARY KEY,";
    }

    public static function integer(string $column, bool $is_null = false): void
    {
        $null = $is_null ? '' : 'NOT NULL';
        self::$query .= "$column INT $null,";
    }

    public static function string(string $column, bool $is_null = false, int $count = 255): void
    {
        $null = $is_null ? '' : 'NOT NULL';
        self::$query .= "$column VARCHAR($count) $null,";
    }

    public static function text(string $column, bool $is_null = false): void
    {
        $null = $is_null ? '' : 'NOT NULL';
        self::$query .= "$column TEXT $null,";
    }

    public static function enum(string $column, array $values, bool $is_null = false): void
    {
        $null = $is_null ? '' : 'NOT NULL';
        $enumValues = "'" . implode("', '", $values) . "'";
        self::$query .= "$column ENUM($enumValues) $null,";
    }

    public static function timestamp(string $column, bool $is_null = false): void
    {
        $null = $is_null ? '' : 'NOT NULL';
        self::$query .= "$column TIMESTAMP $null,";
    }
}