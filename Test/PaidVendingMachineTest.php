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
        $this->machine->configure(Choice::Cola, Can::Coke, 100);
    }

    public function testMachineWithNoPaymentDeliversNothing() {
        assertThat($this->machine->deliver(Choice::Cola)->value, equalTo(Can::Nothing->value));
    }

    public function testPaidExactDeliversDrink() {
        $this->machine->pay(100);
        assertThat($this->machine->deliver(Choice::Cola)->value, equalTo(Can::Coke->value));
    }

    public function testPaidTooMuchDeliversDrink() {
        $this->machine->pay(150);
        assertThat($this->machine->deliver(Choice::Cola)->value, equalTo(Can::Coke->value));
    }
    public function testPaidTooLittleDoesNotDeliverDrink() {
        $this->machine->pay(50);
        assertThat($this->machine->deliver(Choice::Cola)->value, equalTo(Can::Nothing->value));
    }
    public function testDeliverCheapestDrinkWhenPaidForThat() {
        $this->machine->configure(Choice::FizzyOrange, Can::Fanta, 150);
        $this->machine->pay(100);
        assertThat($this->machine->deliver(Choice::Cola)->value, equalTo(Can::Coke->value));
    }
}