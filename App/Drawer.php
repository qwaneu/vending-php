<?php

namespace App;

class Drawer
{
    private $dispensingIndicator;

    public function __construct($dispensingIndicator)
    {
        $this->dispensingIndicator = $dispensingIndicator;
    }

    public function dispenseCan()
    {
        $this->dispensingIndicator->tellCanIsDispensed();
    }
}