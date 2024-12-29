<?php

namespace App\Data;

class Bar
{
    public Foo $foo;

    function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    function bar(): string
    {
        return $this->foo->foo() . " Bar";
    }
}
