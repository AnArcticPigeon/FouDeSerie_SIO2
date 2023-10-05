<?php

namespace App\Dao;
use App\Services\DbConnection;
use App\Entity\Serie;
use \PDO;


class SerieDAO {

    public static function getLesSeries(){
        $req = "select * from serie";
        #serie.id,serie.titre,serie.resume,serie.premiereDiffusion,serie.nbEpisodes,serie.image, pays.id AS Pid, pays.nomPays, pays.drapeau
		$res = DbConnection::getPdoSeries()->prepare($req);
        $res->execute();
		$lesLignes = $res->fetchall(PDO::FETCH_OBJ);
        #$lesSeries= new Serie($lesLignes->id, $lesLignes->titre, $lesLignes->resume, $lesLignes->premiereDiffusion, $lesLignes->nbEpisodes, $lesLignes->image);
		return $lesLignes;
    }

    public static function getUneSerie($id){
        $req = "select * from serie where serie.id = :id";
		$res = DbConnection::getPdoSeries()->prepare($req);
        $res->bindParam(':id',$id,PDO::PARAM_INT);
        $res->execute();
		$uneSerie = $res->fetch(PDO::FETCH_OBJ);
		return $uneSerie;
    }
}