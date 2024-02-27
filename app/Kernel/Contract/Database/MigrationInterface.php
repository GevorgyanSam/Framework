<?php

namespace App\Kernel\Contract\Database;

interface MigrationInterface
{
    public static function up(): void;
    public static function down(): void;
}