<?php

namespace Tests;
use App\CanDispenser;
use App\DispensingIndicator;
use App\Drawer;
use App\StockIndicator;
use Mockery as m;

/**
 * Use MockeryTestCase, or get errors about no assertions
 */
class DrawerIndicatesCanIsDispensedTest extends m\Adapter\Phpunit\MockeryTestCase {

    public function testDispenseCanIndicatesDispensed() {
        $dispensingIndicator = m::mock(DispensingIndicator::class);
        $stockIndicatorStub = m::mock(StockIndicator::class);

        $drawer = new Drawer($dispensingIndicator, $stockIndicatorStub, 1);

        // Either use `expects` or `shouldReceive(...)->once() otherwise you will get errors about no assertions
        $dispensingIndicator->expects('tellCanIsDispensed');

        $drawer->dispenseCan();
    }

    public function testIndicateOutOfStockWhenNoStock() {
        $stockIndicator = m::mock(StockIndicator::class);
        $dispensingIndicator = new DispensingIndicatorStub();

        $drawer = new Drawer($dispensingIndicator, $stockIndicator, 0);
        $stockIndicator->expects('tellOutOfStock')->with("Coke");

        $drawer->dispenseCan();
    }


}
