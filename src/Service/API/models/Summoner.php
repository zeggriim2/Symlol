<?php

namespace App\Service\API\models;

class Summoner
{
    private string $id;
    private string $accountId;
    private string $puuid;
    private string $name;
    private int $profileIconId;
    private int $revisionDate;
    private int $summonerLevel;

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @param string $accountId
     * @return Summoner
     */
    public function setAccountId(string $accountId): Summoner
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return int
     */
    public function getProfileIconId(): int
    {
        return $this->profileIconId;
    }

    /**
     * @param int $profileIconId
     * @return Summoner
     */
    public function setProfileIconId(int $profileIconId): Summoner
    {
        $this->profileIconId = $profileIconId;
        return $this;
    }

    /**
     * @return int
     */
    public function getRevisionDate(): int
    {
        return $this->revisionDate;
    }

    /**
     * @param int $revisionDate
     * @return Summoner
     */
    public function setRevisionDate(int $revisionDate): Summoner
    {
        $this->revisionDate = $revisionDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Summoner
     */
    public function setName(string $name): Summoner
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Summoner
     */
    public function setId(string $id): Summoner
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPuuid(): string
    {
        return $this->puuid;
    }

    /**
     * @param string $puuid
     * @return Summoner
     */
    public function setPuuid(string $puuid): Summoner
    {
        $this->puuid = $puuid;
        return $this;
    }

    /**
     * @return int
     */
    public function getSummonerLevel(): int
    {
        return $this->summonerLevel;
    }

    /**
     * @param int $summonerLevel
     * @return Summoner
     */
    public function setSummonerLevel(int $summonerLevel): Summoner
    {
        $this->summonerLevel = $summonerLevel;
        return $this;
    }
}
