<?php
declare(strict_types=1);
namespace App;

class VendingMachine
{
    private array $choices = [];

    public function deliverDrink(Category $choice): Can
    {
        if($this->isUnavailable($choice)) {
            return new Can(Brand::Nothing, $choice, 0);
        }
        return $this->choices[$choice->name];
    }

    public function configure(Category $choice, Brand $drink, int $amount): void
    {
        $this->choices[$choice->name] = new Can($drink, $choice, $amount);
    }

    public function isUnavailable(Category $choice): bool
    {
        return array_key_exists($choice->name, $this->choices) === false;
    }

    public function buyDrink(Category $choice, int $amount): Can
    {
        if($this->isUnavailable($choice) || $this->choices[$choice->name]->price !== $amount)
        {
            return new Can(Brand::Nothing, $choice, 0);
        }
        return $this->deliverDrink($choice);
    }
}