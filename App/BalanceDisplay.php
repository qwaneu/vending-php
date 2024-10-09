<?php

namespace App;

interface BalanceDisplay
{
    function tellMoneyIsInserted(int $amount): void;
    function tellMoneyReturned(): void;
}