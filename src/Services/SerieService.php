<?php
namespace App\Services;
use App\Dao\SerieDAO;
use App\Entity\Serie;
use Symfony\Component\Validator\Constraints\Length;

class SerieService{

    public function getSeries(){
        $lesSeries = SerieDAO::getLesSeries();
        $lesSeries2 = array();


        foreach ($lesSeries as $uneSerie){
            $laSerie = new Serie($uneSerie -> id, $uneSerie -> titre, $uneSerie -> resume, $uneSerie -> premiereDiffusion, $uneSerie -> nbEpisodes, $uneSerie -> pays, $uneSerie ->image);
            array_push($lesSeries2,$laSerie);
        }

        return $lesSeries2;
    }

    public function getUneSerie($id, $paysService){
        $uneSerie = SerieDAO::getUneSerie($id);

        $uneSerie = new Serie($uneSerie -> id, $uneSerie -> titre, $uneSerie -> resume, $uneSerie -> premiereDiffusion, $uneSerie -> nbEpisodes, $paysService->getUnPays($uneSerie->pays), $uneSerie ->image);

        return $uneSerie;
    }

    public function countSeries(){

        return count(SerieService::getSeries());
    }

}


?>