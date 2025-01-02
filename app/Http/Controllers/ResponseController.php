<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\http\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    function response(Request $request): Response
    {
        return response("hello world");
    }

    function header(): Response
    {
        $body = ["firstName" => "budi", "lastName" => "siregar", "age" => 18];
        return response(json_encode($body), 200)
            ->header('Content-Type', 'application/json')
            ->withHeaders([
                "Author" => "sulthon slebews"
                , "App" => "belajar laravel dasar pzn"
            ]);
    }

    function resView(): Response
    {
        return response()->view("about", ["name" => "budi"]);
    }

    function resJson(): JsonResponse
    {
        $body = ["firstName" => "budi", "lastName" => "siregar", "age" => 18];
        return response()->json($body, 200);
    }

    function resFile(): BinaryFileResponse
    {
        return response()->file(storage_path("app/public/image/photo.jpg"));
    }

    function resDownload(): BinaryFileResponse
    {
        return response()->download(storage_path("app/public/image/photo.jpg"));
    }
}
