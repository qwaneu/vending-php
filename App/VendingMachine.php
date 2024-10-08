<?php

namespace App;

class VendingMachine
{


    private Can $drink = Can::Nothing;

    public function deliverDrink(Choice $choice): Can
    {
        return $this->drink;
    }

    public function configure(Choice $choice, Can $drink)
    {
        $this->drink = $drink;
    }
}