<?php

namespace App\Controller;

use App\Services\SerieService;
use App\Services\PaysService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    #[Route('/series', name: 'app_series')]
    public function index(SerieService $a): Response
    {
        $lesSeries = $a->getSeries();
        $countSeries = $a->countSeries();
        return $this->render('serie/index.html.twig', [
            'controller_name' => 'SerieController',
            'lesSeries' => $lesSeries,
            'countSeries' => $countSeries,
        ]);
    }

    #[Route('/series/{id}', name: 'app_series_detail')]
    public function Detail(SerieService $a, $id, PaysService $paysService): Response
    {
        $laSerie = $a->getUneSerie($id, $paysService);
        return $this->render('serie/detail.html.twig', [
            'controller_name' => 'SerieController',
            'uneSerie' => $laSerie,
        ]);
    }
}
