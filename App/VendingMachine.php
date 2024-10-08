<?php
declare(strict_types=1);
namespace App;

class VendingMachine
{
    private array $choices = [];

    private array $priceList = [];

    public function deliverDrink(Choice $choice): Can
    {
        if($this->isUnavailable($choice)) {
            return Can::Nothing;
        }
        return $this->choices[$choice->name];
    }

    public function configure(Choice $choice, Can $drink, int $price): void
    {
        $this->choices[$choice->name] = $drink;
        $this->priceList[$choice->name] = $price;
    }

    public function isUnavailable(Choice $choice): bool
    {
        return array_key_exists($choice->name, $this->choices) === false;
    }

    public function buyCan(int $amount, Choice $choice): Can
    {
        if ($amount < $this->priceList[$choice->name]) {
            return Can::Nothing;
        }

        return $this->deliverDrink($choice);
    }
}