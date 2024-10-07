<?php

namespace Test;

class VendingMachineTest extends HamcrestTestCase
{
    public function testFirst()
    {
        assertThat(true, equalTo(false));
    }

}
