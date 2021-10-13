<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="gamesEquipe1")
     */
    private $equipe1;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="gamesEquipe2")
     */
    private $equipe2;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateGame;

    /**
     * @ORM\Column(type="integer")
     */
    private $ScoreEquipe1;

    /**
     * @ORM\Column(type="integer")
     */
    private $ScoreEquipe2;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createAt;

    public function __construct()
    {
        $this->createAt = new \DateTimeImmutable();
        $this->ScoreEquipe1 = 0;
        $this->ScoreEquipe2 = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipe1(): ?Equipe
    {
        return $this->equipe1;
    }

    public function setEquipe1(?Equipe $equipe1): self
    {
        $this->equipe1 = $equipe1;

        return $this;
    }

    public function getEquipe2(): ?Equipe
    {
        return $this->equipe2;
    }

    public function setEquipe2(?Equipe $equipe2): self
    {
        $this->equipe2 = $equipe2;

        return $this;
    }

    public function getDateGame(): ?\DateTimeInterface
    {
        return $this->dateGame;
    }

    public function setDateGame(?\DateTimeInterface $dateGame): self
    {
        $this->dateGame = $dateGame;

        return $this;
    }

    public function getScoreEquipe1(): ?int
    {
        return $this->ScoreEquipe1;
    }

    public function setScoreEquipe1(int $ScoreEquipe1): self
    {
        $this->ScoreEquipe1 = $ScoreEquipe1;

        return $this;
    }

    public function getScoreEquipe2(): ?int
    {
        return $this->ScoreEquipe2;
    }

    public function setScoreEquipe2(int $ScoreEquipe2): self
    {
        $this->ScoreEquipe2 = $ScoreEquipe2;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }
}
