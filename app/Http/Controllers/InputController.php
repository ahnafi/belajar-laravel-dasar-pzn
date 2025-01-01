<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    function Hello(Request $request): string
    {
        $input = $request->input("name");
        return "hello " . $input;
    }

    function HelloFirstName(Request $request): string
    {
        var_dump($request->input("name"));
        return "hello " . $request->input("name.first");
    }

    function HelloInput(Request $request): string
    {
        $input = $request->input();
        return json_encode($input);
    }

    function HelloArray(Request $request): string
    {
        $input = $request->input("product.*.name");
        var_dump($input);
        return json_encode($input);
    }
}
