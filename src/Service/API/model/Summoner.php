<?php

class Summoner {

    private $id;
    private $accoundId;
    private $puuid;
    private $name;
    private $profileIconId;
    private $revisionDate;
    private $summonerLevel;

    public function __construct(
        string $id,
        string $accoundId,
        string $puuid,
        string $name,
        int $profileIconId,
        int $revisionDate,
        int $summonerLevel
    )
    {
        $this->id = $id;
        $this->accoundId = $accoundId;
        $this->puuid = $puuid;
        $this->name = $name;
        $this->profileIconId = $profileIconId;
        $this->revisionDate = $revisionDate;
        $this->summonerLevel = $summonerLevel;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }


    public function getAccountId()
    {
        return $this->accoundId;
    }

    public function setAccountId(string $accoundId): self
    {
        $this->accoundId = $accoundId;

        return $this;
    }

    public function getPuuid()
    {
        return $this->puuid;
    }

    public function setPuuid(string $puuid): self
    {
        $this->puuid = $puuid;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getProfileIconId()
    {
        return $this->profileIconId;
    }

    public function setProfileIconId(int $profileIconId): self
    {
        $this->profileIconId = $profileIconId;

        return $this;
    }

    public function getRevisionDate()
    {
        return $this->revisionDate;
    }

    public function setRevisionDate(int $revisionDate): self
    {
        $this->revisionDate = $revisionDate;

        return $this;
    }

    public function getSummonerLevel()
    {
        return $this->summonerLevel;
    }

    public function setSummonerLevel(int $summonerLevel): self
    {
        $this->summonerLevel = $summonerLevel;

        return $this;
    }
}