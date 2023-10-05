<?php

namespace App\Dao;
use App\Services\DbConnection;
use App\Entity\Pays;
use \PDO;


class PaysDAO {

    public static function getLesPays(){
        $req = "select * from pays";
		$res = DbConnection::getPdoSeries()->prepare($req);
        $res->execute();
		$lesLignes = $res->fetchall(PDO::FETCH_OBJ);
        #$lesSeries= new Serie($lesLignes->id, $lesLignes->titre, $lesLignes->resume, $lesLignes->premiereDiffusion, $lesLignes->nbEpisodes, $lesLignes->image);
		return $lesLignes;
    }

    public static function getUnPays($id){
        $req = "select * from pays where pays.id = :id";
		$res = DbConnection::getPdoSeries()->prepare($req);
        $res->bindParam(':id',$id,PDO::PARAM_INT);
        $res->execute();
		$uneSerie = $res->fetch(PDO::FETCH_OBJ);
		return $uneSerie;
    }
}