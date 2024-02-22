<?php

namespace App\Models;

use App\Kernel\Core\Database\Model;
use App\Kernel\Core\Database\QueryBuilder;

class User extends Model
{
    use QueryBuilder;

    protected static string $table = 'users';
    protected static string $primaryKey = 'id';
    protected static string $keyType = 'int';
    protected static array $fillable = [
        'name',
        'description',
        'role',
        'status',
        'created_at'
    ];
}