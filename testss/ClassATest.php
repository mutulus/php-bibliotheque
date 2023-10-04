<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;


class ClassATest extends TestCase
{
    /**
     * @test
     */
    public function Addition_AvecDesNombresPositifs_SommeCorrectePositive(){
        $this->assertEquals(expected: 1,actual: 1);

    }
}