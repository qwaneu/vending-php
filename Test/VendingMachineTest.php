<?php

namespace Test;

use App\Choice;
use App\VendingMachine;


class VendingMachineTest extends HamcrestTestCase
{
    public function testChoicelessMachineDeliversNothing()
    {

        $machine = new VendingMachine();
        $choice = Choice::Cola->value;
        assertThat($machine->deliver($choice)->value, equalTo("Nothing"));
    }



}
