<?php

namespace App\Tests;

use App\Adherent;
use PHPUnit\Framework\TestCase;


class AdherentTest extends TestCase
{
    /**
     * @test
     */
    public function DateJour_avecDesDates_datesEgales(){
        $adherent=new Adherent("Jean","Francois");
        $date=\DateTime::createFromFormat("d/m/Y",date("d/m/Y"));
        $this->assertEquals(expected: $date->format("d/m/Y"),actual:$adherent->getDateAdhesion()->format("d/m/Y") );
    }
    /**
     * @test
     */
   /* public function DateJour_avecDate_EstDefini(){
        $adherent=new Adherent("Jean","Francois","12/10/22");
        $this->assertContains($adherent->);
    }*/
}