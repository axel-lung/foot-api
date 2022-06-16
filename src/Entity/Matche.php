<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MatcheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatcheRepository::class)]
#[ApiResource]
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

    #[ORM\ManyToOne(targetEntity: area::class, inversedBy: 'matches')]
    private $area;

    #[ORM\ManyToOne(targetEntity: competition::class, inversedBy: 'matches')]
    private $competition;

    #[ORM\ManyToOne(targetEntity: team::class, inversedBy: 'matches')]
    private $homeTeam;

    #[ORM\ManyToOne(targetEntity: team::class, inversedBy: 'matches')]
    private $awayTeam;

    #[ORM\ManyToOne(targetEntity: team::class, inversedBy: 'matches')]
    private $winnerTeam;

    #[ORM\OneToMany(mappedBy: 'matche', targetEntity: Bet::class)]
    private $bets;

    public function __construct()
    {
        $this->bets = new ArrayCollection();
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

    public function getArea(): ?area
    {
        return $this->area;
    }

    public function setArea(?area $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getCompetition(): ?competition
    {
        return $this->competition;
    }

    public function setCompetition(?competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function getHomeTeam(): ?team
    {
        return $this->homeTeam;
    }

    public function setHomeTeam(?team $homeTeam): self
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    public function getAwayTeam(): ?team
    {
        return $this->awayTeam;
    }

    public function setAwayTeam(?team $awayTeam): self
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    public function getWinnerTeam(): ?team
    {
        return $this->winnerTeam;
    }

    public function setWinnerTeam(?team $winnerTeam): self
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
}
