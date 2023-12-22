<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;

#[ORM\Table(name: 'serie')]
#[ORM\Entity(repositoryClass: SerieRepository::class)]
#[ORM\InheritanceType('SINGLE_TABLE')]
#[ ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ ORM\DiscriminatorMap(['tv' => SerieTV::class, 'web' => WebSerie::class])]

class Serie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique:true)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resume = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true, name: 'premiereDiffusion')]
    private ?\DateTimeInterface $premiereDiffusion = null;

    #[ORM\Column(nullable: true, name: 'nbEpisodes')]
    #[Assert\GreaterThan(0, message: "pas assez d'episodes")]
    #[Assert\LessThan(1000, message: "trop d'episodes")]
    private ?int $nbEpisodes = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Image()]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'lesSeries')]
    #[ORM\JoinColumn(name: "idPays", referencedColumnName :"id")]
    private ?Pays $lePays = null;

    #[ORM\ManyToMany(targetEntity: Genre::class, inversedBy: 'lesSeries')]
    #[ORM\JoinColumn(name: 'idSerie', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'idGenre', referencedColumnName: 'id')]
    private Collection $lesGenres;

    public function __construct()
    {
        $this->lesGenres = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): static
    {
        $this->resume = $resume;

        return $this;
    }

    public function getPremiereDiffusion(): ?\DateTimeInterface
    {
        return $this->premiereDiffusion;
    }

    public function setPremiereDiffusion(?\DateTimeInterface $premiereDiffusion): static
    {
        $this->premiereDiffusion = $premiereDiffusion;

        return $this;
    }

    public function getNbEpisodes(): ?int
    {
        return $this->nbEpisodes;
    }

    public function setNbEpisodes(?int $nbEpisodes): static
    {
        $this->nbEpisodes = $nbEpisodes;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getLePays(): ?Pays
    {
        return $this->lePays;
    }

    public function setLePays(?Pays $lePays): static
    {
        $this->lePays = $lePays;

        return $this;
    }

    /**
     * @return Collection<int, Genre>
     */
    public function getLesGenres(): Collection
    {
        return $this->lesGenres;
    }

    public function addLesGenre(Genre $lesGenre): static
    {
        if (!$this->lesGenres->contains($lesGenre)) {
            $this->lesGenres->add($lesGenre);
        }

        return $this;
    }

    public function removeLesGenre(Genre $lesGenre): static
    {
        $this->lesGenres->removeElement($lesGenre);

        return $this;
    }

}
