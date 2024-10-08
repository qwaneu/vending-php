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

    public function testDeliverEnergyDrinkWhenConfigured() {
        $vendingMachine = new VendingMachine();
        $vendingMachine->configure(Choice::EnergyDrink, Can::Nalu);
        assertThat($vendingMachine->deliverDrink(Choice::EnergyDrink)->value , equalTo(Can::Nalu->value));
    }

}
