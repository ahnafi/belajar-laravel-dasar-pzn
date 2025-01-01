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

    function HelloType(Request $request): string
    {
        $name = $request->string("name");
        $married = $request->boolean("married");
        $birth_date = $request->date("birth_date", "y-m-d");

        return json_encode(
            [
                "name" => $name,
                "married" => $married,
                "birth_date" => $birth_date
            ]
        );
    }

    function FilterOnly(Request $request): string
    {
        $name = $request->only("name.first", "name.last");
        return json_encode($name);
    }

    function FilterExcept(Request $request): string
    {
        $user = $request->except("admin");
        return json_encode($user);
    }

    function FilterMerge(Request $request): string
    {
        $request->merge(["admin" => false]);
        $user = $request->input();
        return json_encode($user);
    }
}
