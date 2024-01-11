<?php

namespace App\DataFixtures;

use App\Entity\SerieTV;
use App\Entity\WebSerie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SerieFixtures extends Fixture {
    public function load(ObjectManager $manager) {

        for ($i = 0; $i < 5; $i++) {
            $uneSerie= new SerieTV();
            $uneSerie->setTitre("titre$i");
            $uneSerie->setResume("resume$i");
            $uneSerie->setImage("image$i");
            $manager->persist($uneSerie);
        }

        for ($i = 5; $i < 10; $i++) {
            $uneSerie= new WebSerie();
            $uneSerie->setTitre("titre$i");
            $uneSerie->setResume("resume$i");
            $uneSerie->setImage("image$i");
            $manager->persist($uneSerie);
        }
        $manager->flush();
    }
}
?>