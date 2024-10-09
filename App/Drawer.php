<?php

namespace App;

class Drawer
{
    private DispensingIndicator $dispensingIndicator;

    public function __construct(DispensingIndicator $dispensingIndicator)
    {
        $this->dispensingIndicator = $dispensingIndicator;
    }

    public function dispenseCan()
    {
        $this->dispensingIndicator->tellCanIsDispensed();
    }
}