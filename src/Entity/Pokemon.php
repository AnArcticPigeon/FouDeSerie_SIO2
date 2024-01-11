<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity ;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
#[ORM\InheritanceType('SINGLE_TABLE')]
#[ ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ ORM\DiscriminatorMap(['mer' => PokemonMer::class, 'casanier' => PokemonCasanier::class])]
#[UniqueEntity('nom')]

class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $poids = null;

    #[ORM\Column(nullable: true)]
    private ?int $taille = null;


    #[ORM\ManyToMany(targetEntity: Attaque::class, inversedBy: 'lesPokemons')]
    #[ORM\JoinColumn(name: 'idPokemon', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'idAttaque', referencedColumnName: 'id')]
    private Collection $lesAttaques;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "idDresseur", referencedColumnName :"id")]
    private ?Dresseur $leDresseur = null;

    public function __construct()
    {
        $this->lesAttaques = new ArrayCollection();
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

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(?int $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(?int $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * @return Collection<int, Attaque>
     */
    public function getLesAttaques(): Collection
    {
        return $this->lesAttaques;
    }

    public function addLesAttaque(Attaque $lesAttaque): static
    {
        if (!$this->lesAttaques->contains($lesAttaque)) {
            $this->lesAttaques->add($lesAttaque);
        }

        return $this;
    }

    public function removeLesAttaque(Attaque $lesAttaque): static
    {
        $this->lesAttaques->removeElement($lesAttaque);

        return $this;
    }

    public function getLeDresseur(): ?Dresseur
    {
        return $this->leDresseur;
    }

    public function setLeDresseur(?Dresseur $leDresseur): static
    {
        $this->leDresseur = $leDresseur;

        return $this;
    }
}
