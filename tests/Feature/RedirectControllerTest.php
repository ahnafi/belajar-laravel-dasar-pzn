<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{

    function testRedirectFrom()
    {
        $this->get("/redirect/from")->assertRedirect("/redirect/to");
    }

    function testRedirectName()
    {
        $this->get("/redirect/name")
            ->assertRedirect("/redirect/name/budi");
    }

    function testRedirectAction()
    {
        $this->get("/redirect/action")->assertRedirect("/redirect/name/budi");
    }

    function testRedirectAway()
    {
        $this->get("/redirect/away")
            ->assertRedirect("https://sulthon.blue");
    }
}
