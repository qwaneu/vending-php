<?php

namespace Test;

use App\Choice;
use App\Can;
use App\VendingMachine;


class VendingMachineTest extends HamcrestTestCase
{
    public function testChoicelessMachineDeliversNothing()
    {
        $machine = new VendingMachine();
        $choice = Choice::Cola->value;
        assertThat($machine->deliver($choice)->value, equalTo("Nothing"));
    }

    public function testMachineConfiguredWithCokeDeliversCoke() {
        $machine = new VendingMachine();
        $machine->configure(Choice: Choice::Cola, drink: Can::Coke);
        assertThat($machine->deliver("Cola")->value, equalTo("Coke"));
    }



}
