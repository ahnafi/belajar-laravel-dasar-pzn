<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptTest extends TestCase
{
    function testEncrypt()
    {
        $encrypt = Crypt::encrypt("budiono siregar");
        var_dump($encrypt);
        $decrypt = Crypt::decrypt($encrypt);
        self::assertEquals("budiono siregar", $decrypt);
    }
}
