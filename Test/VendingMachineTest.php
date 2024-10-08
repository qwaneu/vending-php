<?php
declare(strict_types=1);
namespace Tests;

use App\Can;
use App\Choice;
use App\VendingMachine;

class VendingMachineTest extends HamcrestTestCase
{
    private VendingMachine $vendingMachine;

    private int $noMoney = 0;
    private int $notEnoughMoney = 1;
    private int $enoughMoneyForEnergy = 2;
    private int $enoughMoneyForDietCoke = 16;
    private int $tooMuchMoney = 400;
    private int $noChange = 0;

    public function setUp(): void
    {
        parent::setUp();
        $this->vendingMachine = new VendingMachine();
        $this->vendingMachine->configure(Choice::DietCaffeineDrink, Can::DietCoke, $this->enoughMoneyForDietCoke);
        $this->vendingMachine->configure(Choice::EnergyDrink, Can::Nalu, $this->enoughMoneyForEnergy);
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

    public function testNoMoneyNoFun()
    {
        assertThat($this->vendingMachine->buyCan($this->noMoney, Choice::EnergyDrink)['drink']->value, equalTo(Can::Nothing->value));
    }

    public function testNotEnoughMoneyNoCan()
    {
        assertThat($this->vendingMachine->buyCan($this->notEnoughMoney, Choice::EnergyDrink)['drink']->value, equalTo(Can::Nothing->value));
    }

    public function testEnoughMoneyCan()
    {
        assertThat($this->vendingMachine->buyCan($this->enoughMoneyForEnergy, Choice::EnergyDrink)['drink']->value, equalTo(Can::Nalu->value));
    }

    public function testTooMuchMoneyCan()
    {
        assertThat($this->vendingMachine->buyCan($this->tooMuchMoney, Choice::DietCaffeineDrink)['drink']->value, equalTo(Can::DietCoke->value));
    }

    public function testGetNoChange()
    {
        $noChangeResult = ['drink' => Can::Nalu, 'change' => $this->noChange];

        assertThat($this->vendingMachine->buyCan($this->enoughMoneyForEnergy, Choice::EnergyDrink), equalTo($noChangeResult));
    }

    public function testGetChange()
    {
        $changeAmount = 398;
        $changeResult = ['drink' => Can::Nalu, 'change' => $changeAmount];

        assertThat($this->vendingMachine->buyCan($this->tooMuchMoney, Choice::EnergyDrink), equalTo($changeResult));
    }
}
