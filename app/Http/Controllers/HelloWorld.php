<?php

namespace App\Http\Controllers;


class HelloWorld extends Controller
{
    public function __invoke()
    {
        return reponse()->json('Hello World');
    }
}
