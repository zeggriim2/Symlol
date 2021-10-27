<?php

namespace App\Service\API\models;

use App\Service\API\models\League\LeagueItem;

class LeagueList
{
    private string $tier;
    private string $leagueId;
    private string $queue;
    private string $name;
    /**
     * @var LeagueItem[]
     */
    private array $entries;

    /**
     * @return string
     */
    public function getTier(): string
    {
        return $this->tier;
    }

    /**
     * @param string $tier
     * @return LeagueList
     */
    public function setTier(string $tier): LeagueList
    {
        $this->tier = $tier;
        return $this;
    }

    /**
     * @return string
     */
    public function getLeagueId(): string
    {
        return $this->leagueId;
    }

    /**
     * @param string $leagueId
     * @return LeagueList
     */
    public function setLeagueId(string $leagueId): LeagueList
    {
        $this->leagueId = $leagueId;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueue(): string
    {
        return $this->queue;
    }

    /**
     * @param string $queue
     * @return LeagueList
     */
    public function setQueue(string $queue): LeagueList
    {
        $this->queue = $queue;
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
     * @return LeagueList
     */
    public function setName(string $name): LeagueList
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return LeagueItem[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param LeagueItem[] $entries
     * @return LeagueList
     */
    public function setEntries(array $entries): LeagueList
    {
        $this->entries = $entries;
        return $this;
    }
}
