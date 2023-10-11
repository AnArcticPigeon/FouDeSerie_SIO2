<?php

namespace App\Controller;

use App\Entity\Pays;
use App\Controller\Serie;
use App\Repository\SerieRepository;
use App\Repository\PaysRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaysController extends AbstractController
{
    #[Route('/pays', name: 'app_pays')]
    public function index(): Response
    {
        return $this->render('pays/index.html.twig', [
            'controller_name' => 'PaysController',
        ]);
    }

    #[Route('/testPays', name: 'app_test_pays')]
    public function testPays(ManagerRegistry $doctrine, SerieRepository $serieRepo, PaysRepository $paysRepo)
    {
            /*
            // Instanciation classique d'un objet : création d’une entité
            $pays = new Pays();
            $pays->setNom('Antarctica');*/
            $entityManager=$doctrine->getManager();
            // tell Doctrine you want to (eventually) save the Product (no queries yet)
           // $entityManager->persist($pays);
            //$entityManager->flush();
            
            $pays = $paysRepo->find(2);
           
            /* 
            $laSerie = $serieRepo->find(1);
            $laSerie->setLePays($pays);
            $entityManager->persist($laSerie);
            */
            // actually executes the queries (i.e. the INSERT query)*
            $entityManager->flush();

         return new Response('Saved new product with id '.$pays->getId());
    }
}
