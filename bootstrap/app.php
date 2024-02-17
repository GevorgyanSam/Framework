<?php

use App\Kernel\Core\Container\Container;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(base_path());
$dotenv->load();

Container::loadProviders();
Container::loadRoutes();
