<?php

namespace App;

use Hamcrest\Util;
use PHPUnit\Framework\TestCase;

Util::registerGlobalFunctions();

class VendingMachineTest extends TestCase
{
    public function testFrameworkWorks()
    {
       assertThat(false, equalTo(true));
    }
}
