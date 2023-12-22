<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Attaque;

class AttaqueController extends AbstractController
{
    #[Route('/attaque', name: 'app_attaque')]
    public function listeAttaque( ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Attaque::class);
        $lesAttaques = $repository->findBy([], ['nom' => 'ASC']);
        return $this->render('attaque/listeAttaques.html.twig', 
                            ['lesAttaques' => $lesAttaques] );
    }


    #[Route('/attaques/{id}', name: 'app_delete_attaque')]
    public function deleteSerie($id,Request $request, ManagerRegistry $doctrine): Response
    {
      
        try {    
            // Vérifier le token CSRF
            if (!$this->isCsrfTokenValid('delete_attaque', $request->get('verif'))) {
                throw $this->createAccessDeniedException('Erreur jeton CSRF invalide');
            }
            $repository = $doctrine->getRepository(Attaque::class);
            $attaque = $repository->find($id);
            if (!$attaque)
                throw $this->createNotFoundException('cette attaque n\'existe pas');
            $entityManager=$doctrine->getManager();
            $entityManager->remove($attaque);
            $entityManager->flush();
            $this->addFlash('success', 'l\'attaque a bien été supprimée');
            return $this->redirectToRoute('app_attaque');
        }
        catch (\Exception $e) {
                    return $this->render('errors/error.html.twig', ['message' => $e->getMessage()]);
                }
      
    }

}
