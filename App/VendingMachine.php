<?php

namespace App;

class VendingMachine
{

    private Can $chosen_drink = Can::Nothing;

    public function deliver($choice)
    {
        return $this->chosen_drink;
    }

    public function configure(choice $Choice, Can $drink)
    {
        $this->chosen_drink = $drink;
    }
}