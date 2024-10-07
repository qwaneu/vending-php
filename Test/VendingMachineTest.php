<?php

namespace Test;

use App\Choice;
use App\Can;
use App\VendingMachine;


class VendingMachineTest extends HamcrestTestCase
{
    private VendingMachine $machine;

    public function setUp(): void {
        parent::setUp();
        $this->machine = new VendingMachine();

        $this->machine->configure(Choice::FizzyOrange, Can::Fanta);
        $this->machine->configure(Choice::Cola, Can::Coke);
    }
    public function testMachineDeliversNothingForUnconfiguredChoice()
    {
        $choice = Choice::Beer->value;
        assertThat($this->machine->deliver($choice)->value, equalTo("Nothing"));
    }

    public function testMachineConfiguredWithCokeDeliversCoke() {
        assertThat($this->machine->deliver("Cola")->value, equalTo("Coke"));
    }

    public function testMachineConfiguredWithFantaAndCokeDeliversFanta()
    {
        assertThat($this->machine->deliver("FizzyOrange")->value, equalTo("Fanta"));
    }

}
