<?php

use App\Kernel\Core\Container\Container;
use Dotenv\Dotenv;

Container::singleton(Dotenv::class, function () {
    $dotenv = Dotenv::createImmutable(base_path());
    $dotenv->load();
    return $dotenv;
});
