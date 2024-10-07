<?php

namespace Test;

use App\Choice;
use App\Can;
use App\VendingMachine;


class VendingMachineTest extends HamcrestTestCase
{
    public function setUp(): void {
        parent::setUp();
        $this->machine = new VendingMachine();
    }
    public function testChoicelessMachineDeliversNothing()
    {
        $choice = Choice::Cola->value;
        assertThat($this->machine->deliver($choice)->value, equalTo("Nothing"));
    }

    public function testMachineConfiguredWithCokeDeliversCoke() {
        $this->machine->configure(Choice: Choice::Cola, drink: Can::Coke);
        assertThat($this->machine->deliver("Cola")->value, equalTo("Coke"));
    }

    /*
    public function testMachineConfiguredWithFantaAndCokeDeliversFanta()
    {

        assertThat($machine->deliver("FizzyOrange")->value, equalTo("Fanta"));
    }*/



}
