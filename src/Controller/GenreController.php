<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Repository\GenreRepository;
use App\Repository\PaysRepository;
use App\Repository\SerieRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{
    #[Route('/genre', name: 'app_genre')]
    public function index(): Response
    {
        return $this->render('genre/index.html.twig', [
            'controller_name' => 'GenreController',
        ]);
    }

    #[Route('/testGenre', name: 'app_test_genre')]
    public function testGenre(ManagerRegistry $doctrine, SerieRepository $serieRepo, GenreRepository $genreRepo)
    {
            $entityManager=$doctrine->getManager();
            /*
            $genre = new Genre();
            $genre->setLibelle('Penguin Martial Arts');
:]
;-()x
            $entityManager->persist($genre);
            $entityManager->flush();
            */
            
            $leGenre = $genreRepo->find(1);
           
            
            $laSerie = $serieRepo->find(1);
            $laSerie->addLesGenre($leGenre);
            $entityManager->persist($laSerie);
            
            // actually executes the queries (i.e. the INSERT query)*
            $entityManager->flush();

         return new Response('Saved new product with id '.$laSerie->getId());
    }
}
