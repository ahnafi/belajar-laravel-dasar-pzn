<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContohMiddlewareTest extends TestCase
{
    function testMiddlewareInvalid()
    {
        $this->get("/middleware/api")->assertStatus(401)->assertSeeText("Access Denied");
    }

    function testMiddlewareValid()
    {
        $this->withHeaders([
            "X-API-KEY" => "TEST"
        ])->get("/middleware/api")->assertStatus(200)->assertSeeText("OK");
    }
}
