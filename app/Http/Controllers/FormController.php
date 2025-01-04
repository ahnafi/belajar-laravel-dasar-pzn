<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FormController extends Controller
{
    function Form(): Response
    {
        return response()->view('form');
    }

    function hello(Request $request): Response
    {
        $name = $request->input('name');
        return response()->view("hello", ['name' => $name]);
    }
}
