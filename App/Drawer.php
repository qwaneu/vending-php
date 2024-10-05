<?php

namespace App;

class Drawer
{
    private $display;
    private $canBin;

    public function __construct($display, $canBin)
    {
        $this->display = $display;
        $this->canBin = $canBin;
    }

    public function dispenseCan()
    {
        $this->display->tellCanIsDispensed();
    }
}