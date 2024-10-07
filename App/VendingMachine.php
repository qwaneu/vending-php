<?php

namespace App;

class VendingMachine
{

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
        $this->choices[$choice->value] = $drink;
    }
}