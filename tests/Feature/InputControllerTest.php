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

    function testType()
    {
        $this->post("/input/type", [
            "name" => "budi",
            "married" => false,
            "birth_date" => "2000-01-01"
        ])->assertSeeText("budi")->assertSeeText("true")->assertSeeText("2000-01-01");
    }

    function testOnly()
    {
        $this->post("/input/only", ["name" => [
            "first" => "budi",
            "last" => "siregar",
            "birth_date" => "2000-01-01",
            "address" => []
        ]])->assertDontSeeText("address")->assertDontSeeText("birth_date");

    }

    function testExcept()
    {
        $this->post("/input/except",
            ["name" => [
                "first" => "budi",
                "last" => "siregar",
                "birth_date" => "2000-01-01",
                "address" => []
            ],
                "admin" => "hehehehehe"]
        )->assertDontSeeText("admin");
    }

    function testMerge()
    {

        $this->post("/input/filter/merge", [
            ["name" => [
                "first" => "budi",
                "last" => "siregar",
                "birth_date" => "2000-01-01",
                "address" => []
            ],
                "admin" => true]
        ])->assertSeeText("admin")->assertSeeText("false");
    }

}
