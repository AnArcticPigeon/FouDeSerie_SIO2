<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Entity\SerieTV;
use App\Entity\WebSerie;
use App\Form\SerieTvType;
use App\Form\SerieWebType;
use App\Repository\SerieTVRepository;
use App\Repository\WebSerieRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/admin/ajouterTV', name: 'app_SerieTV')]
    public function serieTV(Request $request, ManagerRegistry $doctrine): Response
    {
        $serie = new SerieTV();
        $form=$this->createForm(SerieTvType::class, $serie);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $entityManager=$doctrine->getManager();
            $entityManager->persist($serie);
            $entityManager->flush();
            $this->addFlash('success', 'Serie Enregistré');
            return $this->redirectToRoute('app_series');
        };


        
        return $this->render('admin/ajouter.html.twig', [
            'controller_name' => 'AdminController',
            'type' => 'SerieTV',
            'formAddSerie' => $form -> createView(),
        ]);
    }

    #[Route('/admin/ajouterWeb', name: 'app_SerieWEB')]
    public function serieWEB(Request $request, ManagerRegistry $doctrine): Response
    {
        $serie = new WebSerie();
        $form=$this->createForm(SerieWebType::class, $serie);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $entityManager=$doctrine->getManager();
            $entityManager->persist($serie);
            $entityManager->flush();
            $this->addFlash('success', 'Serie Enregistré');
            return $this->redirectToRoute('app_series');
        };


        
        return $this->render('admin/ajouter.html.twig', [
            'controller_name' => 'AdminController',
            'type' => 'WebSerie',
            'formAddSerie' => $form -> createView(),
        ]);
    }

    #[Route('/admin/serieDelete/{id}', name: 'app_SerieDelete')]
    public function serieDelete($id, Request $request, ManagerRegistry $doctrine): Response
    {
        $nomDuTocken = "deleteToken".$id;
        $valeurDuToken = $request->get('token');
        try {
            if($this->isCsrfTokenValid($nomDuTocken, $valeurDuToken)){
                $repository = $doctrine->getRepository(Serie::class);
                $serie = $repository->find($id);
                $entityManager=$doctrine->getManager();
                $entityManager->remove($serie);
                $entityManager->flush();
                $this->addFlash('successDelete', 'Serie Supprimer');
                return $this->redirectToRoute('app_series', [
                    'controller_name' => 'AdminController',
                    
                ]);
            }
        
            else{
                throw $this->createNotFoundException('Token Invalide');
                /* Flash
                $this->addFlash('error', 'token Invalide');
                return $this->redirectToRoute('app_series', [
                    'controller_name' => 'AdminController',
                    
                ]);
                */
            }
        }
        catch (Exception $e) {
            return $this->render('error/error.html.twig', [
                'controller_name' => 'AdminController',
                'errorMessage' => $e->getMessage(),
                'errorCode' => $e->getCode()
            ]);
        }   

     
    }

    #[Route('/admin/seriesTV/{id}', name: 'app_SerieTVModify')]
    public function serieTVModify($id, Request $request, ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Serie::class);
        $serie = $repository->find($id);
        $form=$this->createForm(SerieTvType::class, $serie);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $entityManager=$doctrine->getManager();
            $entityManager->persist($serie);
            $entityManager->flush();
            return $this->redirectToRoute('app_series');
        };

        return $this->render('admin/modify.html.twig', [
            'controller_name' => 'AdminController',
            'type' => 'SerieTV',
            'formAddSerie' => $form -> createView(),
        ]);
    }

    #[Route('/admin/seriesWEB/{id}', name: 'app_SerieWEBModify')]
    public function serieWEBModify($id, Request $request, ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Serie::class);
        $serie = $repository->find($id);
        $form=$this->createForm(SerieWebType::class, $serie);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $entityManager=$doctrine->getManager();
            $entityManager->persist($serie);
            $entityManager->flush();
            return $this->redirectToRoute('app_series');
        };

        return $this->render('admin/modify.html.twig', [
            'controller_name' => 'AdminController',
            'type' => 'SerieWEB',
            'formAddSerie' => $form -> createView(),
        ]);
    }

    #[Route('/admin/series', name: 'app_listeSeries')]
    public function listeSerie(ManagerRegistry $doctrine, SerieTVRepository $serieTvRepo, WebSerieRepository $webSerieRepo): Response
    {
        /*Cette instruction renvoie une instance de la classe ProductRepository; Le
        lien a été fait grace à l'attribut PHP #[ORM\Entity(repositoryClass:…) dans
        la classe Product */
        $repository = $doctrine->getRepository(Serie::class);
        // look for *all* Product objects
        $lesSeries = $repository->findBy([],['titre' => 'ASC']);


        $countSeries = count($lesSeries);
        return $this->render('admin/series.html.twig', [
            'controller_name' => 'SerieController',
            'lesSeriesTV' => $lesSeriesTV = $serieTvRepo->findBy([],['titre' => 'ASC']),
            'lesSeriesWeb' => $lesSeriesWeb = $webSerieRepo->findBy([],['titre' => 'ASC']),
            'countSeries' => $countSeries,
        ]);
    }

}
