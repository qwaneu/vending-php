<?php
declare(strict_types=1);
namespace Tests;

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
        $this->vendingMachine->configure(Choice::DietCaffeineDrink, Can::DietCoke);
        $this->vendingMachine->configure(Choice::EnergyDrink, Can::Nalu);
    }
    public function testDeliverNothing()
    {
        assertThat($this->vendingMachine->deliverDrink(Choice::Beer)->value, equalTo(Can::Nothing->value));
    }

    public function testDeliverEnergyDrinkWhenConfigured()
    {
        assertThat($this->vendingMachine->deliverDrink(Choice::EnergyDrink)->value , equalTo(Can::Nalu->value));
    }

    public function testDeliverDietCokeWhenConfigured()
    {
        assertThat($this->vendingMachine->deliverDrink(Choice::DietCaffeineDrink)->value, equalTo(Can::DietCoke->value));
    }

    public function testBuyCan()
    {
        assertThat($this->vendingMachine->buyDrink(Choice::EnergyDrink, 1), equalTo(Can::Nalu));
    }
}
