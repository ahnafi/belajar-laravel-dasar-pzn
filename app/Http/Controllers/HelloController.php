<?php

namespace App\Http\Controllers;

use App\Services\HelloService;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    private HelloService $helloService;

    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }

    function hello($name): string
    {
        return $this->helloService->hello($name);
    }

    function request(Request $request): string
    {
        return $request->path() . PHP_EOL
            . $request->method() . PHP_EOL
            . $request->fullUrl() . PHP_EOL
            . $request->header('Accept') . PHP_EOL;
    }
}
