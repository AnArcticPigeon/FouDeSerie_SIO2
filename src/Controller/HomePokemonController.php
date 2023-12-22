<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePokemonController extends AbstractController
{
    #[Route('/home/pokemon', name: 'app_home_pokemon')]
    public function index(): Response
    {
        return $this->render('home_pokemon/index.html.twig');
    }
}
