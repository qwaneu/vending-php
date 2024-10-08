<?php

namespace App;

class Drawer
{
    private $display;

    public function __construct($display)
    {
        $this->display = $display;
    }

    public function dispenseCan()
    {
        $this->display->tellCanIsDispensed();
    }
}