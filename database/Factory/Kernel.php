<?php

namespace Database\Factory;

use App\Models\User;

class Kernel
{
    public static array $factories = [
        User::class => UserFactory::class
    ];
}