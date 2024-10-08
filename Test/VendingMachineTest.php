<?php
declare(strict_types=1);
namespace Tests;

use App\Brand;
use App\Category;
use App\VendingMachine;

class VendingMachineTest extends HamcrestTestCase
{
    private VendingMachine $vendingMachine;

    private int $dietCokePrice = 80;
    private int $energyDrinkPrice = 100;

    public function setUp(): void
    {
        parent::setUp();
        $this->vendingMachine = new VendingMachine();
        $this->vendingMachine->configure(Category::DietCaffeineDrink, Brand::DietCoke, $this->dietCokePrice);
        $this->vendingMachine->configure(Category::EnergyDrink, Brand::Nalu, $this->energyDrinkPrice);
    }
    public function testDeliverNothing()
    {
        assertThat($this->vendingMachine->deliverDrink(Category::Beer)->brand->value, equalTo(Brand::Nothing->value));
    }

    public function testDeliverEnergyDrinkWhenConfigured()
    {
        assertThat($this->vendingMachine->deliverDrink(Category::EnergyDrink)->brand->value , equalTo(Brand::Nalu->value));
    }

    public function testDeliverDietCokeWhenConfigured()
    {
        assertThat($this->vendingMachine->deliverDrink(Category::DietCaffeineDrink)->brand->value, equalTo(Brand::DietCoke->value));
    }

    public function testBuyCan()
    {
        assertThat($this->vendingMachine->buyDrink(Category::EnergyDrink, $this->energyDrinkPrice)->brand, equalTo(Brand::Nalu));
    }

    public function testInsufficientCash()
    {
        $notEnoughCash = 0;
        assertThat($this->vendingMachine->buyDrink(Category::EnergyDrink, $notEnoughCash)->brand, equalTo(Brand::Nothing));
    }

    public function testBuyDietCaffeineDrink()
    {
        assertThat($this->vendingMachine->buyDrink(Category::DietCaffeineDrink, $this->dietCokePrice)->brand, equalTo(Brand::DietCoke));
    }
}
