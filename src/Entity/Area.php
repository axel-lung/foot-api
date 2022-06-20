<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AreaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AreaRepository::class)]
#[ApiResource(
    security: 'is_granted("ROLE_USER")',
    collectionOperations: [
        'post' => [
            'openapi_context' => [
                'security' => [['bearer' => []]]
            ]
        ]
    ],
    itemOperations: [
        'get' => [
            'openapi_context' => [
                'security' => [['bearer' => []]]
            ]
        ]
    ]
)]
class Area
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 3, nullable: true)]
    private $countryCode;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $flag;

    #[ORM\ManyToOne(targetEntity: area::class)]
    private $parentArea;

    #[ORM\OneToMany(mappedBy: 'area', targetEntity: Competition::class)]
    private $competitions;

    #[ORM\OneToMany(mappedBy: 'area', targetEntity: Matche::class)]
    private $matches;

    public function __construct()
    {
        $this->areas = new ArrayCollection();
        $this->competitions = new ArrayCollection();
        $this->matches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(?string $flag): self
    {
        $this->flag = $flag;

        return $this;
    }

    public function getParentArea(): ?Area
    {
        return $this->parentArea;
    }

    public function setParentAreaId(?Area $parentArea): self
    {
        $this->parentArea = $parentArea;

        return $this;
    }

    /**
     * @return Collection<int, Competition>
     */
    public function getCompetitions(): Collection
    {
        return $this->competitions;
    }

    public function addCompetition(Competition $competition): self
    {
        if (!$this->competitions->contains($competition)) {
            $this->competitions[] = $competition;
            $competition->setArea($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->competitions->removeElement($competition)) {
            // set the owning side to null (unless already changed)
            if ($competition->getArea() === $this) {
                $competition->setArea(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Matche>
     */
    public function getMatches(): Collection
    {
        return $this->matches;
    }

    public function addMatch(Matche $match): self
    {
        if (!$this->matches->contains($match)) {
            $this->matches[] = $match;
            $match->setArea($this);
        }

        return $this;
    }

    public function removeMatch(Matche $match): self
    {
        if ($this->matches->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getArea() === $this) {
                $match->setArea(null);
            }
        }

        return $this;
    }
}
