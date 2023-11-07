<?php

namespace App\Entity;

use App\Repository\WebSerieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WebSerieRepository::class)]
class WebSerie extends Serie
{

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $site = null;

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(?string $site): static
    {
        $this->site = $site;

        return $this;
    }

}
