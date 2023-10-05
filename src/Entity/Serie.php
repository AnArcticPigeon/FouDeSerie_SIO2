<?php

namespace App\Entity;


class Serie
{
    private $id;
    private $titre;
    private $resume; 
    private $premiereDiffusion;
    private $nbEpisodes;
    private $pays;
    private $image;

    public function __construct($unId, $unTitre, $unResume, $unePremiereDiffusion, $unNbEpisode, $unPays, $uneImage){
        $this->id=$unId;
        $this->titre=$unTitre;
        $this->resume=$unResume;
        $this->premiereDiffusion=$unePremiereDiffusion;
        $this->nbEpisodes=$unNbEpisode;
        $this->pays=$unPays;
        $this->image=$uneImage;
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
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of resume
     */ 
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set the value of resume
     *
     * @return  self
     */ 
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get the value of premiereDiffusion
     */ 
    public function getPremiereDiffusion()
    {
        return $this->premiereDiffusion;
    }

    /**
     * Set the value of premiereDiffusion
     *
     * @return  self
     */ 
    public function setPremiereDiffusion($premiereDiffusion)
    {
        $this->premiereDiffusion = $premiereDiffusion;

        return $this;
    }

    /**
     * Get the value of nbEpisodes
     */ 
    public function getNbEpisodes()
    {
        return $this->nbEpisodes;
    }

    /**
     * Set the value of nbEpisodes
     *
     * @return  self
     */ 
    public function setNbEpisodes($nbEpisodes)
    {
        $this->nbEpisodes = $nbEpisodes;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

        /**
         * Get the value of unPays
         */ 
        public function getPays()
        {
                return $this->pays;
        }

        /**
         * Set the value of unPays
         *
         * @return  self
         */ 
        public function setPays($unPays)
        {
                $this->pays = $unPays;

                return $this;
        }
}

?>