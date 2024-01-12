<?php
namespace app\Tests\Entity;

use App\Entity\Serie;
use App\Entity\SerieTV;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Repository\SerieRepository;

class SerieEntityTest extends KernelTestCase {

    public function testIsNewSerie(){
        $uneSerie = new Serie();
        $uneSerie->setPremiereDiffusion(new \DateTime("12-10-2023"));
        $isNew=$uneSerie->isNewSerie();
        $this->assertEquals(true,$isNew);
        //$this->assertTrue(true);
        //$this->assertNotFalse($isNew);
    }

    public function testIsNotNewSerie(){
        $uneSerie = new Serie();
        $uneSerie->setPremiereDiffusion(new \DateTime("10-10-2022"));
        $isNew=$uneSerie->isNewSerie();
        $this->assertEquals(true,$isNew);
    }

}
?>