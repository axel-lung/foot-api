<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BetRepository::class)]
#[ApiResource(
    collectionOperations: [
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
class Bet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'bets')]
    private $user;

    #[ORM\ManyToOne(targetEntity: Matche::class, inversedBy: 'bets')]
    private $matche;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'bets')]
    private $teams;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMatche(): ?Matche
    {
        return $this->matche;
    }

    public function setMatche(?Matche $matche): self
    {
        $this->matche = $matche;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->teams;
    }

    public function setTeam(?Team $teams): self
    {
        $this->teams = $teams;

        return $this;
    }
}
