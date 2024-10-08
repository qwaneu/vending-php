<?php

namespace Tests;


// Necessary for assertThat
use Hamcrest\Util;

Util::registerGlobalFunctions();

class HamcrestTestCase extends \PHPUnit\Framework\TestCase
{

    protected function tearDown(): void
    {
        $this->addToAssertionCount(\Hamcrest\MatcherAssert::getCount());
    }

}