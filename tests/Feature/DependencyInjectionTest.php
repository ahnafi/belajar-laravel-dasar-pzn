<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{
    public function testDependencyInjections(): void
    {
//       $foo = new Foo();
        $foo2 = $this->app->make(Foo::class);
        $foo = $this->app->make(Foo::class);

        self::assertEquals("foo", $foo->foo());
        self::assertEquals("foo", $foo2->foo());
        self::assertNotSame($foo, $foo2);
    }


}
