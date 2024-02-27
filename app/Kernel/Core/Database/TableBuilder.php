<?php

namespace App\Kernel\Core\Database;

class TableBuilder
{
    public string $query = '';

    public function getQuery(): string
    {
        return substr($this->query, 0, -1);
    }

    public function id(string $column = 'id', $autoIncrement = true): void
    {
        $increment = $autoIncrement ? "AUTO_INCREMENT" : "";
        $this->query .= "$column INT $increment PRIMARY KEY,";
    }

    public function integer(string $column, bool $is_null = false): void
    {
        $null = $is_null ? '' : 'NOT NULL';
        $this->query .= "$column INT $null,";
    }

    public function string(string $column, bool $is_null = false, int $count = 255): void
    {
        $null = $is_null ? '' : 'NOT NULL';
        $this->query .= "$column VARCHAR($count) $null,";
    }

    public function text(string $column, bool $is_null = false): void
    {
        $null = $is_null ? '' : 'NOT NULL';
        $this->query .= "$column TEXT $null,";
    }

    public function enum(string $column, array $values, bool $is_null = false): void
    {
        $null = $is_null ? '' : 'NOT NULL';
        $enumValues = "'" . implode("', '", $values) . "'";
        $this->query .= "$column ENUM($enumValues) $null,";
    }

    public function timestamp(string $column, bool $is_null = false): void
    {
        $null = $is_null ? '' : 'NOT NULL';
        $this->query .= "$column TIMESTAMP $null,";
    }
}