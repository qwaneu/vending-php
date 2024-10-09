<?php

namespace App;

class Drawer
{
    public function __construct(
        private readonly DispensingIndicator $dispensingIndicator,
        private readonly StockIndicator      $stockIndicator,
        private readonly int $stockLevel
    )
    {
    }

    public function dispenseCan() : void
    {
        if($this->stockLevel ==0 ) {
            $this->stockIndicator->tellOutOfStock("Coke");
            return;
        }
        $this->dispensingIndicator->tellCanIsDispensed();
    }
}