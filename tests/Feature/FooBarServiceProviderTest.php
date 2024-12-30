<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FooBarServiceProviderTest extends TestCase
{
    public function testServiceProvider()
    {
        $foo = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);

        self::assertSame($foo, $foo2);
        self::assertSame($foo, $bar->foo);
    }

    function testPropertySinletons()
    {
        $hello = $this->app->make(HelloService::class);
        $hello2 = $this->app->make(HelloService::class);

        self::assertSame($hello, $hello2);
    }

    function testEmpty()
    {
        self::assertTrue(true);
    }

}
