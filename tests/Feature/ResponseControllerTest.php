<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    function testResponse()
    {
        $this->get("/response/hello")->assertStatus(200)
            ->assertSeeText("hello world");
    }

    function testHeader()
    {
        $this->get("/response/header")->assertStatus(200)->assertSeeText("budi")
            ->assertHeader("Content-Type", "application/json")
            ->assertHeader("App", "belajar laravel dasar pzn")
            ->assertHeader("Author", "sulthon slebews");
    }

    function testReturnView()
    {
        $this->get("/response/type/view")->assertStatus(200)->assertSeeText("hello budi");
    }

    function testReturnJson()
    {
        $this->get("/response/type/json")->assertStatus(200)
            ->assertJson(["firstName" => "budi", "lastName" => "siregar", "age" => 18]);
    }

    function testReturnFile()
    {
        $this->get("/response/type/file")->assertHeader("Content-Type", "image/jpeg");
    }

    function testReturnDownload()
    {
        $this->get("/response/type/download")->assertDownload("photo.jpg");
    }
}
