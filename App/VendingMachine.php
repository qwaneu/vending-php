<?php
declare(strict_types=1);
namespace App;

class VendingMachine
{
    private array $choices = [];

    public function deliverDrink(Choice $choice): Can
    {
        if($this->isUnavailable($choice)) {
            return Can::Nothing;
        }
        return $this->choices[$choice->name];
    }

    public function configure(Choice $choice, Can $drink): void
    {
        $this->choices[$choice->name] = $drink;
    }

    public function isUnavailable(Choice $choice): bool
    {
        return array_key_exists($choice->name, $this->choices) === false;
    }

    public function buyCan(int $amount, Choice $EnergyDrink)
    {
        return Can::Nothing;
    }
}