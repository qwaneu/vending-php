<?php

namespace Test;

namespace Test;

use App\Choice;
use App\Can;
use App\VendingMachine;
use function PHPUnit\Framework\equalToCanonicalizing;

class PaidVendingMachineTest extends HamcrestTestCase
{
    private VendingMachine $machine;

    public function setUp(): void
    {
        parent::setUp();
        $this->machine = new VendingMachine();
    }

    public function testMachineWithNoPaymentDeliversNothing() {
        $this->machine->configure(Choice::Cola, Can::Coke, 100);
        assertThat($this->machine->deliver(Choice::Cola)->value, equalTo(Can::Nothing->value));
    }

    public function testPaidExactDeliversDrink() {
        $this->machine->configure(Choice::Cola, Can::Coke, 100);
        $this->machine->pay(100);
        assertThat($this->machine->deliver(Choice::Cola)->value, equalTo(Can::Coke->value));
    }

    public function testPaidTooMuchDeliversDrink() {
        $this->machine->configure(Choice::Cola, Can::Coke, 100);
        $this->machine->pay(150);
        assertThat($this->machine->deliver(Choice::Cola)->value, equalTo(Can::Coke->value));
    }
}