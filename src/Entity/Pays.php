<?php
namespace App\Entity;


class Pays
{
    private $id;
    private $nomPays;
    private $drapeau;


    public function __construct($unId, $unNomPays, $unDrapeau){
        $this->id=$unId;
        $this->nomPays=$unNomPays;
        $this->drapeau=$unDrapeau;
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nomPays
     */ 
    public function getNomPays()
    {
        return $this->nomPays;
    }

    /**
     * Set the value of nomPays
     *
     * @return  self
     */ 
    public function setNomPays($nomPays)
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    /**
     * Get the value of drapeau
     */ 
    public function getDrapeau()
    {
        return $this->drapeau;
    }

    /**
     * Set the value of drapeau
     *
     * @return  self
     */ 
    public function setDrapeau($drapeau)
    {
        $this->drapeau = $drapeau;

        return $this;
    }
}
?>