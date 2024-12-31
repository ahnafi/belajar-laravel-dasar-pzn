<?php

namespace Tests\Feature;

use App\Services\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{

    function testController()
    {
        $this->get("/controller/hello/budi")
            ->assertSee("Hello, budi");
    }

    function testRequest()
    {
        $this->get("/controller/request", ["Accept" => "plain/text"])
            ->assertStatus(200)
            ->assertSeeText("GET");
    }


}
