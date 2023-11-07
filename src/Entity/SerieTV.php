<?php

namespace App\Entity;

use App\Repository\SerieTVRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SerieTVRepository::class)]
class SerieTV extends Serie
{
    
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $chaineDiffusion = null;

    public function getChaineDiffusion(): ?string
    {
        return $this->chaineDiffusion;
    }

    public function setChaineDiffusion(?string $chaineDiffusion): static
    {
        $this->chaineDiffusion = $chaineDiffusion;

        return $this;
    }
}
