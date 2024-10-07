<?php

namespace Test;

use App\Choice;
use App\Can;
use App\VendingMachine;
use PHPUnit\Metadata\CoversNothing;


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
        $choice = Choice::Beer;
        assertThat($this->machine->deliver($choice)->value, equalTo(Can::Nothing->value));
    }

    public function testMachineConfiguredWithCokeDeliversCoke() {
        assertThat($this->machine->deliver(Choice::Cola)->value, equalTo(Can::Coke->value));
    }

    public function testMachineConfiguredWithFantaAndCokeDeliversFanta()
    {
        assertThat($this->machine->deliver(Choice::FizzyOrange)->value, equalTo("Fanta"));
    }

}
