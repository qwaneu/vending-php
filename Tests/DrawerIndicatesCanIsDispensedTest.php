<?php

namespace Tests;
use App\CanDispenser;
use App\DispensingIndicator;
use App\Drawer;
use Mockery as m;

/**
 * Use MockeryTestCase, or get errors about no assertions
 */
class DrawerIndicatesCanIsDispensedTest extends m\Adapter\Phpunit\MockeryTestCase {

    public function testDispenseCanIndicatesDipsensed() {
        $display = m::mock(DispensingIndicator::class);

        $drawer = new Drawer($display);

        // Either use `expects` or `shouldReceive(...)->once() otherwise you will get errors about no assertions
        $display->expects('tellCanIsDispensed');

        $drawer->dispenseCan();
    }
}
