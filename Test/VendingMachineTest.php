<?php

namespace Test;

use App\Choice as C;
use App\Can;
use App\VendingMachine as V;
use Hamcrest\Util;
use PHPUnit\Framework\TestCase;

// Necessary for assertThat
Util::registerGlobalFunctions();

class VendingMachineTest extends TestCase
{
    public function testChoicelessMachineDeliversNothing()
    {

        $machine = new V();
        $choice = C::Cola->value;
        assertThat($machine->deliver($choice)->value, equalTo("Nothing"));
    }

    protected function tearDown(): void
    {
        $this->addToAssertionCount(\Hamcrest\MatcherAssert::getCount());
    }
}
