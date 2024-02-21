<?php

use App\Kernel\Core\Container\Container;
use App\Kernel\Core\Database\Database;
use Dotenv\Dotenv;

Container::singleton(Dotenv::class, function () {
    $dotenv = Dotenv::createImmutable(base_path());
    $dotenv->load();
    return $dotenv;
});

Container::singleton(Database::class, function () {
    $db = new Database;
    return $db->connect();
});
