<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'lePays', targetEntity: Serie::class)]
    private Collection $lesSeries;

    public function __construct()
    {
        $this->lesSeries = new ArrayCollection();
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
            $lesSeries->setLePays($this);
        }

        return $this;
    }

    public function removeLesSeries(Serie $lesSeries): static
    {
        if ($this->lesSeries->removeElement($lesSeries)) {
            // set the owning side to null (unless already changed)
            if ($lesSeries->getLePays() === $this) {
                $lesSeries->setLePays(null);
            }
        }

        return $this;
    }
}
