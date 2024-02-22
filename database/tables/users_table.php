<?php

use App\Kernel\Contract\Database\MigrationInterface;
use App\Kernel\Core\Database\Schema;
use App\Kernel\Core\Database\Builder;

return new class implements MigrationInterface
{
    public static function up(): void
    {
        Schema::create('users', function () {
            Builder::id();
            Builder::string('name');
            Builder::text('description');
            Builder::enum('role', ['admin', 'normal']);
            Builder::integer('status');
            Builder::timestamp('created_at');
            return Builder::query();
        });
    }

    public static function down(): void
    {
        Schema::dropIfExists('users');
    }
};
