<?php

namespace Database\Tables;

use App\Kernel\Contract\Database\MigrationInterface;
use App\Kernel\Core\Database\Schema;
use App\Kernel\Core\Database\TableBuilder;

return new class implements MigrationInterface
{
    public static function up(): void
    {
        Schema::create('users', function (TableBuilder $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('role', ['admin', 'normal']);
            $table->integer('status');
            $table->timestamp('created_at');
        });
    }

    public static function down(): void
    {
        Schema::dropIfExists('users');
    }
};
