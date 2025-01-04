<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLgenerationTest extends TestCase
{
    function testUrlgeneration()
    {
        $this->get("/url/current?name=budi")->assertSeeText("/url/current?name=budi");
    }
}
