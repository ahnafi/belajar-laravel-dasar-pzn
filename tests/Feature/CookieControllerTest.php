<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    function testCreateCookie()
    {
        $this->get("/cookie/set")
            ->assertCookie("user-id", "123456")
            ->assertCookie("is-admin", false);
    }

    function testGetCookie()
    {
        $this->withCookie('user-id', '123456')
//            ->withcookie('is-admin', 'true')
            ->get("/cookie/get")->assertStatus(200)
            ->assertJson(
                [
                    "userId" => "123456",
                    "isAdmin" => "false"
                ]
            );
    }

    function testClearCookie()
    {
        $this->get("/cookie/clear")
            ->assertCookieExpired("user-id")
            ->assertCookieExpired("is-admin");
    }
}
