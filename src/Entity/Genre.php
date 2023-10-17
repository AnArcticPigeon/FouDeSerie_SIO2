<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToMany(targetEntity: Serie::class, mappedBy: 'lesGenres')]
    private Collection $lesSeries;

    public function __construct()
    {
        $this->lesSeries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Serie>
     */
    public function getLesSeries(): Collection
    {
        return $this->lesSeries;
    }

    public function addLesSeries(Serie $lesSeries): static
    {
        if (!$this->lesSeries->contains($lesSeries)) {
            $this->lesSeries->add($lesSeries);
            $lesSeries->addLesGenre($this);
        }

        return $this;
    }

    public function removeLesSeries(Serie $lesSeries): static
    {
        if ($this->lesSeries->removeElement($lesSeries)) {
            $lesSeries->removeLesGenre($this);
        }

        return $this;
    }
}
