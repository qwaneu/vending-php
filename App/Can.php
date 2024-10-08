<?php

namespace App;

class Can
{

    public Brand $brand;
    public Category $category;
    public int $price;


    public function __construct(Brand $brand, Category $category, int $price)
    {
        $this->brand=$brand;
        $this->category=$category;
        $this->price=$price;
    }


}