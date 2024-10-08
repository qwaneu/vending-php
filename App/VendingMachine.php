<?php

namespace App;

class VendingMachine
{

    public function deliverDrink(Choice $choice): Can
    {
        return Can::Nothing;
    }
}