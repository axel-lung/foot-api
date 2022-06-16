<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RoomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
#[ApiResource(
    security: 'is_granted("ROLE_USER")',
    collectionOperations: [
        'get' => [
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
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $playerLimit;

    #[ORM\Column(type: 'date')]
    private $dateFrom;

    #[ORM\Column(type: 'date')]
    private $dateTo;

    #[ORM\Column(type: 'float', nullable: true)]
    private $balance;

    #[ORM\Column(type: 'boolean')]
    private $isCashPrice;

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

    public function getPlayerLimit(): ?int
    {
        return $this->playerLimit;
    }

    public function setPlayerLimit(int $playerLimit): self
    {
        $this->playerLimit = $playerLimit;

        return $this;
    }

    public function getDateFrom(): ?\DateTimeInterface
    {
        return $this->dateFrom;
    }

    public function setDateFrom(\DateTimeInterface $dateFrom): self
    {
        $this->dateFrom = $dateFrom;

        return $this;
    }

    public function getDateTo(): ?\DateTimeInterface
    {
        return $this->dateTo;
    }

    public function setDateTo(\DateTimeInterface $dateTo): self
    {
        $this->dateTo = $dateTo;

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(?float $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function isIsCashPrice(): ?bool
    {
        return $this->isCashPrice;
    }

    public function setIsCashPrice(bool $isCashPrice): self
    {
        $this->isCashPrice = $isCashPrice;

        return $this;
    }
}
