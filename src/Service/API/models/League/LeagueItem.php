<?php

namespace App\Service\API\models\League;

class LeagueItem
{
    private string $summonerId;
    private string $summonerName;
    private int $leaguePoints;
    private string $rank;
    private int $wins;
    private int $losses;
    private bool $veteran;
    private bool $inactive;
    private bool $freshBlood;
    private bool $hotStreak;

    /**
     * @return string
     */
    public function getSummonerId(): string
    {
        return $this->summonerId;
    }

    /**
     * @param string $summonerId
     * @return LeagueItem
     */
    public function setSummonerId(string $summonerId): LeagueItem
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
     * @return LeagueItem
     */
    public function setSummonerName(string $summonerName): LeagueItem
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
     * @return LeagueItem
     */
    public function setLeaguePoints(int $leaguePoints): LeagueItem
    {
        $this->leaguePoints = $leaguePoints;
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
     * @return LeagueItem
     */
    public function setRank(string $rank): LeagueItem
    {
        $this->rank = $rank;
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
     * @return LeagueItem
     */
    public function setWins(int $wins): LeagueItem
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
     * @return LeagueItem
     */
    public function setLosses(int $losses): LeagueItem
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
     * @return LeagueItem
     */
    public function setVeteran(bool $veteran): LeagueItem
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
     * @return LeagueItem
     */
    public function setInactive(bool $inactive): LeagueItem
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
     * @return LeagueItem
     */
    public function setFreshBlood(bool $freshBlood): LeagueItem
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
     * @return LeagueItem
     */
    public function setHotStreak(bool $hotStreak): LeagueItem
    {
        $this->hotStreak = $hotStreak;
        return $this;
    }
}
