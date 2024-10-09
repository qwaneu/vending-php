<?php

namespace Tests;

use App\BalanceDisplay;
use App\CoinSlot;
use App\MoneyTill;
use Mockery as m;

class MoneyTillTest extends m\Adapter\Phpunit\MockeryTestCase
{

    public function testMoneyIsAdded()
    {
        $balanceDisplay = m::mock(BalanceDisplay::class);

        $moneyTill = new MoneyTill($balanceDisplay);
        $balanceDisplay->expects('tellMoneyIsInserted');

        $moneyTill->addMoney(10);
    }

    public function testMoneyReturnedIsDisplayed()
    {
        $balanceDisplay = m::mock(BalanceDisplay::class);
        $moneyTill = new MoneyTill($balanceDisplay);

        $balanceDisplay->allows('tellMoneyIsInserted');
        $balanceDisplay->expects('tellMoneyReturned');

        $moneyTill->addMoney(10);
        $moneyTill->returnMoney();
    }
}