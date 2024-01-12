<?php

namespace App\DataFixtures;

use App\Entity\Serie;
use App\Entity\SerieTV;
use App\Entity\SerieWEB;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class SerieFixtures extends Fixture {
    public function load(ObjectManager $manager) {

        // choix de la langue des données
        $faker = Faker\Factory::create('fr_FR');
        // on créé 4 séries TV
        for ($i = 0; $i < 5; $i++) {
            $unSerie= new SerieTV();
            $unSerie->setTitre($faker->word());
            $unSerie->setResume($faker->sentences(8,true));
            $unSerie->setPremiereDiffusion($faker->dateTime());
            $unSerie->setNbEpisodes($faker->numberBetween(1,1000));
            $unSerie->setImage($faker->image('/var/www/html/fouDeSerie/public/images',220,327,'penguin',null,null,null,null,'png'));
            $unSerie->setChaineDiffusion($faker->url());
            $manager->persist($unSerie);
        }

        $manager->flush();
    }
}
?>