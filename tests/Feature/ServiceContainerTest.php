<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testBind()
    {

        $this->app->bind(Person::class, function ($app) {
            return new Person("budi", "siregar");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertNotNull($person1);

        self::assertEquals("budi", $person1->firstName);
        self::assertEquals("budi", $person2->firstName);
        self::assertNotSame($person1, $person2);

    }

    function testSingleton()
    {
        $this->app->singleton(Person::class, function ($app) {
            return new Person("budi", "siregar");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        self::assertNotNull($person1);
        self::assertEquals("budi", $person1->firstName);
        self::assertEquals("siregar", $person2->lastName);
        self::assertSame($person1, $person2);
    }

    function testInstance()
    {
        $budi = new Person("budi", "siregar");
        $this->app->instance(Person::class, $budi);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        self::assertNotNull($person1);
        self::assertEquals("budi", $person1->firstName);
        self::assertEquals("siregar", $person2->lastName);
        self::assertSame($person1, $person2);
    }

    function testDependencyInjection()
    {
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function ($app) {
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });

        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo->foo(), $bar->foo->foo());
        self::assertSame($bar, $bar2);
        self::assertSame($bar->foo, $bar2->foo);
    }

    function testInterface()
    {
        $this->app->singleton(HelloService::class,HelloServiceIndonesia::class);

        $helloService = $this->app->make(HelloService::class);

        self::assertNotNull($helloService);
        self::assertEquals("Hello, budi", $helloService->hello("budi"));
    }
}
