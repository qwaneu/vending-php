<?php

namespace App;

class VendingMachine
{

    public function deliver($choice)
    {
        if(!$this->chosen_drink)
            return Can::Nothing;
        return $this->chosen_drink;
    }

    public function configure(choice $Choice, Can $drink)
    {
        $this->chosen_drink = $drink;
    }
}