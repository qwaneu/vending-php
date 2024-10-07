<?php

namespace App;

class VendingMachine
{

    private array $choices = array();
    private int $credits = 0;
    private int $price = 0;
    private mixed $prices = array();

    public function deliver(Choice $choice): Can
    {
        if(!array_key_exists($choice->value, $this->choices)) {
            return Can::Nothing;
        }
        if($this->prices[$choice->value] > $this->credits) {
            return Can::Nothing;
        }
        return $this->choices[$choice->value];
    }

    public function configure(Choice $choice, Can $drink, int $price = 0): void
    {
        $this->choices[$choice->value] = $drink;
        $this->price = $price;
        $this->prices[$choice->value] = $price;
    }

    public function pay(int $amount): void
    {
        $this->credits = $amount;
    }
}