<?php

namespace App\Entity;

use App\Repository\AttaqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttaqueRepository::class)]
class Attaque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Pokemon::class, mappedBy: 'lesAttaques')]
    private Collection $lesPokemons;

    public function __construct()
    {
        $this->lesPokemons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Pokemon>
     */
    public function getLesPokemons(): Collection
    {
        return $this->lesPokemons;
    }

    public function addLesPokemon(Pokemon $lesPokemon): static
    {
        if (!$this->lesPokemons->contains($lesPokemon)) {
            $this->lesPokemons->add($lesPokemon);
            $lesPokemon->addLesAttaque($this);
        }

        return $this;
    }

    public function removeLesPokemon(Pokemon $lesPokemon): static
    {
        if ($this->lesPokemons->removeElement($lesPokemon)) {
            $lesPokemon->removeLesAttaque($this);
        }

        return $this;
    }
}
