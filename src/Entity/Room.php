<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            "security" => "is_granted('ROLE_SYSTEM')",
            'openapi_context' => [
                'security' => [['bearerAuth' => []]]
            ]
        ],
        'post' => [
            "security" => "is_granted('ROLE_SYSTEM')",
            'openapi_context' => [
                'security' => [['bearerAuth' => []]]
            ]
        ]
    ],
    itemOperations: [
        'get' => [
            "security" => "is_granted('ROLE_USER')",
            'openapi_context' => [
                'security' => [['bearerAuth' => []]]
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

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'Room')]
    private $users;

    #[ORM\ManyToMany(targetEntity: Matche::class, inversedBy: 'rooms')]
    private $matche;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->matche = new ArrayCollection();
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

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addRoom($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeRoom($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, matche>
     */
    public function getMatche(): Collection
    {
        return $this->matche;
    }

    public function addMatche(Matche $matche): self
    {
        if (!$this->matche->contains($matche)) {
            $this->matche[] = $matche;
        }

        return $this;
    }

    public function removeMatche(Matche $matche): self
    {
        $this->matche->removeElement($matche);

        return $this;
    }
}
