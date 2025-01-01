<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    function testInput()
    {
        $this->get("/input/hello?name=budi")->assertSeeText("hello budi");
        $this->post("/input/hello", ["name" => "budi"])->assertSeeText("hello budi");
    }

    function testInputNestedArray()
    {
        $this->post("/input/firstName", ["name" => ["first" => "budi", "last" => "siregar"]])
            ->assertSeeText("hello budi");
    }

    function testGetAllInput()
    {
        $this->post("/input/all", ["name" => ["first" => "budi", "last" => "siregar"]])->assertSeeText("name")->assertSeeText("first")->assertSeeText("last")->assertSeeText("budi");
    }

    function testArrayInput()
    {
        $this->post("/input/product", [
            "product" => [
                ["name" => "foo"],
                ["name" => "bar"],
            ]
        ])->assertSeeText("foo")->assertSeeText("bar");
    }
}
