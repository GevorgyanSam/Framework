<?php

declare(strict_types=1);

use App\Kernel\Core\Container\Container;

ini_set("display_errors", 1);
error_reporting(E_ALL);

require __DIR__ . "/../vendor/autoload.php";
require base_path("bootstrap/app.php");

Container::build();
