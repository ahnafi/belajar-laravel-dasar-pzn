<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    function testBasicRoute()
    {
        $this->get("/hello")->assertStatus(200)->assertSeeText("Hello World");
    }

    function testRedirectRoute()
    {
        $this->get("/about-me")->assertRedirect("/about");
    }

    function testFallbackRoute()
    {
        $this->get("asdadasd")->assertSeeText("error 404");
    }

    function testView()
    {
        $this->get("about")->assertStatus(200)->assertSeeText("about page , hello budi");
    }

    function testNestedView()
    {
        $this->get("/hi")->assertStatus(200)->assertSeeText("hello world");
    }

    function testTemplate()
    {
        $this->view("about", ["name" => "budi"])->assertSeeText("about page , ");
        $this->view("hello.world")->assertSeeText("hello world");
    }
}
