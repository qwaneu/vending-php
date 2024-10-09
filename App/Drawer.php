<?php

namespace App;

class Drawer
{
    private DispensingIndicator $dispensingIndicator;
    private StockIndicator $stockIndicator;
    private int $stockLevel;

    public function __construct(DispensingIndicator $dispensingIndicator, StockIndicator $stockIndicator, int $stockLevel)
    {
        $this->dispensingIndicator = $dispensingIndicator;
        $this->stockIndicator = $stockIndicator;
        $this->stockLevel = $stockLevel;
    }

    public function dispenseCan()
    {
        if($this->stockLevel ==0 ) {
            $this->stockIndicator->tellOutOfStock("Coke");
            return;
        }
        $this->dispensingIndicator->tellCanIsDispensed();
    }
}