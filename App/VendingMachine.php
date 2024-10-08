<?php

namespace App;
class VendingMachine
{

    public function __construct()
    {
    }

    public function deliverDrink($EnergyDrink): Can
    {
        return Can::Nothing;
    }
}