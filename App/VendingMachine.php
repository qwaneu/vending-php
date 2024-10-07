<?php

namespace App;

use PSpell\Dictionary;

class VendingMachine
{

    private Can $chosen_drink = Can::Nothing;
    private array $choices = array();

    public function deliver($choice)
    {
        if($this->choices[$choice] === null) {
            return Can::Nothing;
        }
        return $this->choices[$choice];
    }

    public function configure(Choice $choice, Can $drink)
    {
        $this->chosen_drink = $drink;
        $this->choices[$choice->value] = $drink;
    }
}