<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    function createCookie(Request $request): Response
    {
        return response("hello cookie")
            ->cookie("user-id", "123456", 1000, "/")
            ->cookie("is-admin", false, 1000, "/");
    }

    function getCookie(Request $request): JsonResponse
    {
        return response()->json(
            [
                "userId" => $request->cookie("user-id", "guest"),
                "isAdmin" => $request->cookie("is-admin", "false")
            ]
        );
    }

    function clearCookie(Request $request): Response
    {
        return response("clear cookie")
            ->withoutCookie("user-id", "/")
            ->withoutCookie("is-admin", "/");
    }
}
