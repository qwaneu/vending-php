<?php

namespace Test;

use App\Choice;
use App\Can;
use App\VendingMachine;

class VendingMachineTest extends HamcrestTestCase
{
    public function testFirst()
    {
        assertThat(true, equalTo(false));
    }

}
