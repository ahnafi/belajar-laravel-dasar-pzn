<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    function testUpload()
    {
        $image = UploadedFile::fake()->image('budi.png');

        $this->post("/file/upload", ['image' => $image])->assertSeeText("OK budi.png");
    }
}
