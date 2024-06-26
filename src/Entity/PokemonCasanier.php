<?php

namespace App\Entity;

use App\Repository\PokemonCasanierRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;

#[ORM\Entity(repositoryClass: PokemonCasanierRepository::class)]
class PokemonCasanier extends Pokemon
{
    
    #[ORM\Column(nullable: true, name:'nbPattes')]
    #[Assert\GreaterThan(0, message: "Pas assez de Pattes")]
    #[Assert\LessThan(32, message: "Trop de Patte")]
    private ?int $nbPattes = null;

    #[ORM\Column(nullable: true, name:'nbHeuresTv')]
    private ?int $nbHeuresTv = null;

   

    public function getNbPattes(): ?int
    {
        return $this->nbPattes;
    }

    public function setNbPattes(?int $nbPattes): static
    {
        $this->nbPattes = $nbPattes;

        return $this;
    }

    public function getNbHeuresTv(): ?int
    {
        return $this->nbHeuresTv;
    }

    public function setNbHeuresTv(?int $nbHeuresTv): static
    {
        $this->nbHeuresTv = $nbHeuresTv;

        return $this;
    }
}
