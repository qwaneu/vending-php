<?php

namespace Test;

namespace Test;

use App\Choice;
use App\Can;
use App\VendingMachine;

class PaidVendingMachineTest extends HamcrestTestCase
{
    private VendingMachine $machine;

    public function setUp(): void
    {
        parent::setUp();
        $this->machine = new VendingMachine();
       $this->machine->configure(Choice::Cola, Can::Coke);
    }

    public function testMachineWithNoCreditsDeliversNothing() {
        $this->machine->configure(Choice::Cola, Can::Coke, 100);
        assertThat($this->machine->deliver(Choice::Cola)->value, equalTo(Can::Nothing->value));
    }
}