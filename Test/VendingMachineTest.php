<?php

namespace Test;

use App\Choice as C;
use App\VendingMachine as V;


class VendingMachineTest extends HamcrestTestCase
{
    public function testChoicelessMachineDeliversNothing()
    {

        $machine = new V();
        $choice = C::Cola->value;
        assertThat($machine->deliver($choice)->value, equalTo("Nothing"));
    }

}
