<?php

namespace Test;

use App\Can;
use App\Choice;
use App\VendingMachine;

class VendingMachineTest extends HamcrestTestCase
{
    private VendingMachine $vendingMachine;

    public function setUp(): void
    {
        parent::setUp();
        $this->vendingMachine = new VendingMachine();
    }
    public function testDeliverNothing()
    {
        assertThat($this->vendingMachine->deliverDrink(Choice::EnergyDrink)->value, equalTo(Can::Nothing->value));
    }

    public function testDeliverEnergyDrinkWhenConfigured()
    {
        $this->vendingMachine->configure(Choice::EnergyDrink, Can::Nalu);
        assertThat($this->vendingMachine->deliverDrink(Choice::EnergyDrink)->value , equalTo(Can::Nalu->value));
    }

    public function testDeliverDietCokeWhenConfigured()
    {
        $this->vendingMachine->configure(Choice::DietCoke, Can::DietCoke);
        $this->vendingMachine->configure(Choice::EnergyDrink, Can::Nalu);
        assertThat($this->vendingMachine->deliverDrink(Choice::DietCoke)->value, equalTo(Can::DietCoke->value));
    }
}
