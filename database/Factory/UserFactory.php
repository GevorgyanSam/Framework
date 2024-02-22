<?php

namespace Database\Factory;

use App\Kernel\Contract\Database\FactoryInterface;

class UserFactory implements FactoryInterface
{
    public static function generate(): object
    {
        return (object)[
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'role' => fake()->randomElement(['admin', 'normal']),
            'status' => fake()->numberBetween(0, 1),
            'created_at' => fake()->date('Y-m-d H:i:s')
        ];
    }
}