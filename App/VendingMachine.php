<?php

namespace App;

class VendingMachine
{

    private array $choices = array();

    public function deliver(Choice $choice): Can
    {
        if($this->choices[$choice->value] === null) {
            return Can::Nothing;
        }
        $result = $this->choices[$choice->value];
        return $result;
    }

    public function configure(Choice $choice, Can $drink)
    {
        $this->choices[$choice->value] = $drink;
    }
}