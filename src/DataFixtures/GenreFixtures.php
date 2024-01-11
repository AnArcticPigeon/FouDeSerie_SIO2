<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenreFixtures extends Fixture {
    public function load(ObjectManager $manager) {

        for ($i = 0; $i < 5; $i++) {
            $unGenre= new Genre();
            $unGenre->setLibelle("Genre$i");
            $manager->persist($unGenre);
        }

        $manager->flush();
    }
}
?>