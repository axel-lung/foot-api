<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MatcheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatcheRepository::class)]
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
class Matche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetimetz', nullable: true)]
    private $utcDate;

    #[ORM\Column(type: 'string', length: 9, nullable: true)]
    private $status;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $matchday;

    #[ORM\Column(type: 'string', length: 21, nullable: true)]
    private $stage;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $duration;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $homeScore;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $awayScore;

    #[ORM\Column(type: 'string', length: 7, nullable: true)]
    private $groupe;

    #[ORM\ManyToOne(targetEntity: Area::class, inversedBy: 'matches')]
    private $area;

    #[ORM\ManyToOne(targetEntity: Competition::class, inversedBy: 'matches')]
    private $competition;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'matches')]
    private $homeTeam;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'matches')]
    private $awayTeam;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'matches')]
    private $winnerTeam;

    #[ORM\OneToMany(mappedBy: 'matche', targetEntity: Bet::class)]
    private $bets;

    #[ORM\ManyToMany(targetEntity: Room::class, mappedBy: 'matche')]
    private $rooms;

    public function __construct()
    {
        $this->bets = new ArrayCollection();
        $this->rooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtcDate(): ?\DateTimeInterface
    {
        return $this->utcDate;
    }

    public function setUtcDate(?\DateTimeInterface $utcDate): self
    {
        $this->utcDate = $utcDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getMatchday(): ?int
    {
        return $this->matchday;
    }

    public function setMatchday(?int $matchday): self
    {
        $this->matchday = $matchday;

        return $this;
    }

    public function getStage(): ?string
    {
        return $this->stage;
    }

    public function setStage(?string $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(?string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getHomeScore(): ?int
    {
        return $this->homeScore;
    }

    public function setHomeScore(?int $homeScore): self
    {
        $this->homeScore = $homeScore;

        return $this;
    }

    public function getAwayScore(): ?int
    {
        return $this->awayScore;
    }

    public function setAwayScore(?int $awayScore): self
    {
        $this->awayScore = $awayScore;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(?string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function getHomeTeam(): ?Team
    {
        return $this->homeTeam;
    }

    public function setHomeTeam(?Team $homeTeam): self
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    public function getAwayTeam(): ?Team
    {
        return $this->awayTeam;
    }

    public function setAwayTeam(?Team $awayTeam): self
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    public function getWinnerTeam(): ?Team
    {
        return $this->winnerTeam;
    }

    public function setWinnerTeam(?Team $winnerTeam): self
    {
        $this->winnerTeam = $winnerTeam;

        return $this;
    }

    /**
     * @return Collection<int, Bet>
     */
    public function getBets(): Collection
    {
        return $this->bets;
    }

    public function addBet(Bet $bet): self
    {
        if (!$this->bets->contains($bet)) {
            $this->bets[] = $bet;
            $bet->setMatche($this);
        }

        return $this;
    }

    public function removeBet(Bet $bet): self
    {
        if ($this->bets->removeElement($bet)) {
            // set the owning side to null (unless already changed)
            if ($bet->getMatche() === $this) {
                $bet->setMatche(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Room>
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(Room $room): self
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms[] = $room;
            $room->addMatche($this);
        }

        return $this;
    }

    public function removeRoom(Room $room): self
    {
        if ($this->rooms->removeElement($room)) {
            $room->removeMatche($this);
        }

        return $this;
    }
}
