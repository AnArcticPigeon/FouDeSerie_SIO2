<?php
namespace App\Services;
use App\Dao\PaysDAO;
use App\Entity\Pays;
use Symfony\Component\Validator\Constraints\Length;

class PaysService{

    public function getUnPays($id){
        $unPays = PaysDAO::getUnPays($id);
        $lePays = new Pays($unPays -> id, $unPays -> nomPays, $unPays -> drapeau);

        return $lePays;
    }
}


?>