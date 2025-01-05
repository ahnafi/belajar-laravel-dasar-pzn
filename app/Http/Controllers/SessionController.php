<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SessionController extends Controller
{
    function putSession(Request $request): Response
    {

        $request->session()->put('userId', 'budi');
        $request->session()->put('isMember', 'true');

        return response("OK");
    }

    function pullSession(Request $request): Response
    {
        $userId = $request->session()->pull('userId', "guest");
        $isMember = $request->session()->pull('isMember', "false");

        return response("User : $userId , Is member : $isMember");
    }
}
