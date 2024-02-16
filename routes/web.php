<?php

use App\Kernel\Core\Router\Route;
use App\Http\Controllers\ExampleController;

Route::get('/', [ExampleController::class, 'index'])->middleware('test');
