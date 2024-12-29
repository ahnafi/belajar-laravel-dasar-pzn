<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvTest extends TestCase
{
    public function testEnvVariable()
    {
        $instagram = env("INSTAGRAM");

        self::assertEquals("ahnafi", $instagram);
    }

}
