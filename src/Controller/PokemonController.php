<?php

namespace App\Controller;

use App\Entity\Dresseur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PokemonCasanier;
use App\Entity\Pokemon;
use App\Entity\PokemonMer;
use App\Form\AddDresseurType;
use App\Form\PokemonCasanierType;
use App\Form\PokemonMerType;
use Exception;

class PokemonController extends AbstractController
{
    #[Route('/pokemon', name: 'app_pokemon_liste')]
    public function listePokemon( ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Pokemon::class);
        $lesPokemons = $repository->findBy([], ['nom' => 'ASC']);
        return $this->render('pokemon/listePokemons.html.twig', 
                            ['lesPokemons' => $lesPokemons] );
    }

    #[Route('/pokemon/{type}/add', name: 'app_pokemonCasanier_add')]
    public function addPokemon($type, Request $request, ManagerRegistry $doctrine): Response
    {
        if($type == "cassanier") {
            $pokemon = new PokemonCasanier();
        $form=$this->createForm(PokemonCasanierType::class, $pokemon);
        }

        elseif($type == "mer") {
            $pokemon = new PokemonMer();
            $form=$this->createForm(PokemonMerType::class, $pokemon);
        }

        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $entityManager = $doctrine->getManager();
            $entityManager->persist($pokemon);
            $entityManager->flush();
            return $this->redirectToRoute('app_pokemon_liste');
        }     
        return $this->render('pokemon/addPokemonCasanier.html.twig', [
            'formAddPokemon' => $form->createView(),
            'type' => $type
        ]);
        
    }

    #[Route('/dresseur/add', name: 'app_dresseur_add')]
    public function addDresseur( Request $request, ManagerRegistry $doctrine): Response
    {
        $dresseur= new Dresseur();
        $form=$this->createForm(AddDresseurType::class, $dresseur);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $entityManager = $doctrine->getManager();
            $entityManager->persist($dresseur);
            $entityManager->flush();
            return $this->redirectToRoute('app_pokemon_liste');
        }     
        return $this->render('dresseur/dresseur.html.twig', [
            'formAddDresseur' => $form->createView(),
        ]);
    }

    #[Route('/pokemonCassanier/modif/{id}', name: 'app_pokemonCassanier_modif')]
    public function pokemonCassanierModif($id, Request $request, ManagerRegistry $doctrine): Response
    {
        try{
            $repository = $doctrine->getRepository(Pokemon::class);
            $pokemon = $repository->find($id);
            if(!$pokemon){
                throw $this->createNotFoundException('pokemon introuvable');
            }
            if ($pokemon instanceof PokemonCasanier){
                $form=$this->createForm(PokemonCasanierType::class, $pokemon);
                $type = "cassanier";
            }
            if ($pokemon instanceof PokemonMer){
                $form=$this->createForm(PokemonMerType::class, $pokemon);
                $type = "mer";
            }
            $form->handleRequest($request);
            if($form->isSubmitted() and $form->isValid()){
                $entityManager=$doctrine->getManager();
                $entityManager->persist($pokemon);
                $entityManager->flush();
                return $this->redirectToRoute('app_pokemon_liste');
            };

            return $this->render('pokemon/modifyPokemon.html.twig', [
                'controller_name' => 'AdminController',
                'type' => $type,
                'formAddPokemon' => $form -> createView(),
            ]);
        }
        catch (\Exception $e) {
            return $this->render('errors/error.html.twig',['message'=>$e]);
        };
    }

    #[Route('/pokemon/delete/{id}', name: 'app_pokemonDelete')]
    public function pokemonDelete($id, Request $request, ManagerRegistry $doctrine): Response
    {
        $nomDuTocken = "deleteToken".$id;
        $valeurDuToken = $request->get('token');
        try {
            if($this->isCsrfTokenValid($nomDuTocken, $valeurDuToken)){
                $repository = $doctrine->getRepository(Pokemon::class);
                $pokemon = $repository->find($id);
                $entityManager=$doctrine->getManager();
                $entityManager->remove($pokemon);
                $entityManager->flush();
                $this->addFlash('successDelete', 'Pokemon Tuer avec succée :(');
                return $this->redirectToRoute('app_pokemon_liste', [
                    'controller_name' => 'PokemonController',
                    
                ]);
            }
        
            else{
                throw $this->createNotFoundException('Token Invalide');
            }
        }
        catch (Exception $e) {
            return $this->render('errors/error.html.twig', [
                'controller_name' => 'Pokemoncontroller',
                'message' => $e->getMessage(),
                'errorCode' => $e->getCode()
            ]);
        }   
    }


}
