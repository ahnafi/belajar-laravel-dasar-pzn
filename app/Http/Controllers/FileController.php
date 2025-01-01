<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    function upload(Request $request): string
    {
        $images = $request->file("image");
        $images->storePubliclyAs('image', $images->getClientOriginalName(), "public");
        return "OK " . $images->getClientOriginalName();
    }
}
