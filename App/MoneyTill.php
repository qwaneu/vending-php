<?php

namespace App;

class MoneyTill
{
    public function __construct(private BalanceDisplay $display)
    {
    }

    public function addMoney(int $amount):void
    {
        $this->display->tellMoneyIsInserted($amount);
    }

    public function returnMoney(): void
    {
        $this->display->tellMoneyReturned();
    }
}