<?php

namespace Test;

use Hamcrest\Util;
use App\Choice as C;
use App\VendingMachine as V;
use PHPUnit\Framework\TestCase;

Util::registerGlobalFunctions();

class VendingMachineTest extends TestCase
{
    public function testChoicelessMachineDeliversNothing()
    {

        $machine = new V();
        $choice = C::Cola->value;
        assertThat($machine->deliver($choice)->value(), equalTo("cocke"));
    }
}
