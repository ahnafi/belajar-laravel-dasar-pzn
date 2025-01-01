<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    function testLocal()
    {
        $filesystem = Storage::disk('local');
        $filesystem->put("file.txt", "hello budiono siregar");

        $text = $filesystem->get("file.txt");

        self::assertEquals("hello budiono siregar", $text);
    }

    function testPublic()
    {
        $filesystem = Storage::disk('public');
        $filesystem->put("file.txt", "hello budiono siregar");

        $text = $filesystem->get("file.txt");

        self::assertEquals("hello budiono siregar", $text);
    }

}
