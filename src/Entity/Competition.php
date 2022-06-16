<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompetitionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
#[ApiResource]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[ORM\Column(type: 'string', length: 3, nullable: true)]
    private $code;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $type;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $emblem;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $plan;

    #[ORM\ManyToOne(targetEntity: area::class, inversedBy: 'competitions')]
    private $area;

    #[ORM\ManyToOne(targetEntity: season::class, inversedBy: 'competitions')]
    private $season;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEmblem(): ?string
    {
        return $this->emblem;
    }

    public function setEmblem(?string $emblem): self
    {
        $this->emblem = $emblem;

        return $this;
    }

    public function getPlan(): ?string
    {
        return $this->plan;
    }

    public function setPlan(?string $plan): self
    {
        $this->plan = $plan;

        return $this;
    }

    public function getArea(): ?area
    {
        return $this->area;
    }

    public function setArea(?area $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getSeason(): ?season
    {
        return $this->season;
    }

    public function setSeason(?season $season): self
    {
        $this->season = $season;

        return $this;
    }
}
