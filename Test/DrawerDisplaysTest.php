<?php

namespace Test;
use App\ITakeCans;
use App\Drawer as Drawer;
use Mockery as m;

/**
 * Use MockeryTestCase, or get errors about no assertions
 */
class DrawerDisplaysTest extends m\Adapter\Phpunit\MockeryTestCase {

    public function testDispenseCanNotifiesDisplay() {
        $display = m::mock();
        $canBin = m::mock(ITakeCans::class);

        $drawer = new Drawer($display, $canBin);

        // Either use `expects` or `shouldReceive(...)->once() otherwise get errors about no assertions
        $display->expects('tellCanIsDispensed');

        $drawer->dispenseCan();
    }
}
