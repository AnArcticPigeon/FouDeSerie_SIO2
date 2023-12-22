<?php

namespace App\Entity;

use App\Repository\PokemonMerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonMerRepository::class)]
class PokemonMer extends Pokemon
{
  
    #[ORM\Column(nullable: true, name:'nbNageoires')]
    private ?int $nbNageoires = null;

    
    public function getNbNageoires(): ?int
    {
        return $this->nbNageoires;
    }

    public function setNbNageoires(?int $nbNageoires): static
    {
        $this->nbNageoires = $nbNageoires;

        return $this;
    }
}
