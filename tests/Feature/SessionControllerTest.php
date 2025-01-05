<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    function testPutSession()
    {
        $this->get("/session/put")
            ->assertSeeText("OK")
            ->assertSessionHas(["userId" => "budi"])
            ->assertSessionHas(["isMember" => "true"]);
    }

    function testPullSessionSuccess()
    {
        $this->withSession(['userId' => 'budi'])
            ->withSession(['isMember' => 'true'])
            ->get("/session/pull")->assertSeeText("User : budi , Is member : true");
    }

    function testPullSessionFailed()
    {
        $this->get("/session/pull")->assertSeeText("User : guest , Is member : false");
    }
}
