<?php

declare(strict_types=1);

ini_set("display_errors", 1);
error_reporting(E_ALL);

use App\Kernel\Core\Router\Route;
use Dotenv\Dotenv;

require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv::createImmutable(base_path());
$dotenv->load();

require base_path("routes/web.php");

Route::load();
