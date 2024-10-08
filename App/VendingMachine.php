<?php

namespace App;

class VendingMachine
{
    private array $choices = [];

    public function deliverDrink(Choice $choice): Can
    {
        if(!array_key_exists($choice->name, $this->choices)) {
            return Can::Nothing;
        }
        return $this->choices[$choice->name];
    }

    public function configure(Choice $choice, Can $drink): void
    {
        $this->choices[$choice->name] = $drink;
    }
}