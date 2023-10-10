<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Services\SerieService;
use App\Services\PaysService;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    #[Route('/testEntity', name: 'app_series_test')]
    public function testEntity(ManagerRegistry $doctrine)
    {
        // Instanciation classique d'un objet : création d’une entité
        $serie = new Serie();
        $serie->setTitre('PingKungFu');
        $serie->setResume('Un Pinguin en quéte de vengeance part pour la chine avec l espoire d aprendre le kingfu afin de vanger son frére.');
        $serie->setPremiereDiffusion(new DateTime("06-12-2015"));
        $serie->setNbEpisodes(14);
        $serie->setImage('https://ibb.co/y0RtpDG');
        $entityManager=$doctrine->getManager();
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($serie);
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        return new Response('Saved new product with id '.$serie->getId());
    }

    #[Route('/series', name: 'app_series')]
    public function index(ManagerRegistry $doctrine)
    {
        /*Cette instruction renvoie une instance de la classe ProductRepository; Le
        lien a été fait grace à l'attribut PHP #[ORM\Entity(repositoryClass:…) dans
        la classe Product */
        $repository = $doctrine->getRepository(Serie::class);
        // look for *all* Product objects
        $lesSeries = $repository->findBy([],['titre' => 'ASC']);


        $countSeries = count($lesSeries);
        return $this->render('serie/index.html.twig', [
            'controller_name' => 'SerieController',
            'lesSeries' => $lesSeries,
            'countSeries' => $countSeries,
        ]);
    }

    #[Route('/series/{id}', name: 'app_series_detail')]
    public function Detail($id, ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Serie::class);
        $laSerie = $repository->find($id);
        return $this->render('serie/detail.html.twig', [
            'controller_name' => 'SerieController',
            'uneSerie' => $laSerie,
        ]);
    }

}
