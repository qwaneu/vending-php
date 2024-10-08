<?php

namespace Test;

use App\Can;
use App\Choice;
use App\VendingMachine;

class VendingMachineTest extends HamcrestTestCase
{
    public function testDeliverNothing() {
        $vendingMachine = new VendingMachine();
        assertThat($vendingMachine->deliverDrink(Choice::EnergyDrink), equalTo(Can::Nothing));
    }

}
