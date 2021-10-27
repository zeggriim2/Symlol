<?php

namespace App\Service\API\models;

class LeagueEntry
{
    private string $leagueId;
    private string $queueType;
    private string $tier;
    private string $rank;
    private string $summonerId;
    private string $summonerName;
    private int $leaguePoints;
    private int $wins;
    private int $losses;
    private bool $veteran;
    private bool $inactive;
    private bool $freshBlood;
    private bool $hotStreak;

    /**
     * @return string
     */
    public function getLeagueId(): string
    {
        return $this->leagueId;
    }

    /**
     * @param string $leagueId
     * @return LeagueEntry
     */
    public function setLeagueId(string $leagueId): LeagueEntry
    {
        $this->leagueId = $leagueId;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueType(): string
    {
        return $this->queueType;
    }

    /**
     * @param string $queueType
     * @return LeagueEntry
     */
    public function setQueueType(string $queueType): LeagueEntry
    {
        $this->queueType = $queueType;
        return $this;
    }

    /**
     * @return string
     */
    public function getTier(): string
    {
        return $this->tier;
    }

    /**
     * @param string $tier
     * @return LeagueEntry
     */
    public function setTier(string $tier): LeagueEntry
    {
        $this->tier = $tier;
        return $this;
    }

    /**
     * @return string
     */
    public function getRank(): string
    {
        return $this->rank;
    }

    /**
     * @param string $rank
     * @return LeagueEntry
     */
    public function setRank(string $rank): LeagueEntry
    {
        $this->rank = $rank;
        return $this;
    }

    /**
     * @return string
     */
    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    /**
     * @param string $summonerId
     * @return LeagueEntry
     */
    public function setSummonerId(string $summonerId): LeagueEntry
    {
        $this->summonerId = $summonerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    /**
     * @param string $summonerName
     * @return LeagueEntry
     */
    public function setSummonerName(string $summonerName): LeagueEntry
    {
        $this->summonerName = $summonerName;
        return $this;
    }

    /**
     * @return int
     */
    public function getLeaguePoints(): int
    {
        return $this->leaguePoints;
    }

    /**
     * @param int $leaguePoints
     * @return LeagueEntry
     */
    public function setLeaguePoints(int $leaguePoints): LeagueEntry
    {
        $this->leaguePoints = $leaguePoints;
        return $this;
    }

    /**
     * @return int
     */
    public function getWins(): int
    {
        return $this->wins;
    }

    /**
     * @param int $wins
     * @return LeagueEntry
     */
    public function setWins(int $wins): LeagueEntry
    {
        $this->wins = $wins;
        return $this;
    }

    /**
     * @return int
     */
    public function getLosses(): int
    {
        return $this->losses;
    }

    /**
     * @param int $losses
     * @return LeagueEntry
     */
    public function setLosses(int $losses): LeagueEntry
    {
        $this->losses = $losses;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVeteran(): bool
    {
        return $this->veteran;
    }

    /**
     * @param bool $veteran
     * @return LeagueEntry
     */
    public function setVeteran(bool $veteran): LeagueEntry
    {
        $this->veteran = $veteran;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInactive(): bool
    {
        return $this->inactive;
    }

    /**
     * @param bool $inactive
     * @return LeagueEntry
     */
    public function setInactive(bool $inactive): LeagueEntry
    {
        $this->inactive = $inactive;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFreshBlood(): bool
    {
        return $this->freshBlood;
    }

    /**
     * @param bool $freshBlood
     * @return LeagueEntry
     */
    public function setFreshBlood(bool $freshBlood): LeagueEntry
    {
        $this->freshBlood = $freshBlood;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHotStreak(): bool
    {
        return $this->hotStreak;
    }

    /**
     * @param bool $hotStreak
     * @return LeagueEntry
     */
    public function setHotStreak(bool $hotStreak): LeagueEntry
    {
        $this->hotStreak = $hotStreak;
        return $this;
    }
}
