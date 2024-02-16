<?php

namespace App\Http\Controllers;

class ExampleController
{
    public function index()
    {
        $var = "Its Working";
        return view("example", ["test" => $var]);
    }
}
