<?php

namespace App\Http\Controllers;

class ExampleController
{
    public function index(): void
    {
        $var = "Its Working";
        view("example", ["test" => $var]);
    }
}
