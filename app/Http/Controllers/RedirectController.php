<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    function redirectTo(): string
    {
        return "hello world";
    }

    function redirectFrom(): RedirectResponse
    {
        return redirect("/redirect/to");
    }

    function redirectHello(string $name): string
    {
        return "hello " . $name;
    }

    function redirectName(): RedirectResponse
    {
        return redirect()->route("redirect.hello", ["name" => "budi"]);
    }

    function redirectAction(): RedirectResponse
    {
        return redirect()->action([RedirectController::class, "redirectHello"], ["name" => "budi"]);
    }

    function redirectAway():RedirectResponse {
        return redirect()->away("https://sulthon.blue");
    }
}
