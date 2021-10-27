<?php

namespace App\Service\API\models\MatchTimeLine;

class ParticipantFrame
{
    private ChampionStat $championStats;
    private int $currentGold;
    private DamageStat $damageStats;
    private int $goldPerSecond;
    private int $jungleMinionsKilled;
    private int $level;
    private int $minionsKilled;
    private int $participantId;
    private Position $position;
    private int $timeEnemySpentControlled;
    private int $totalGold;
    private int $xp;

    /**
     * @return ChampionStat
     */
    public function getChampionStats(): ChampionStat
    {
        return $this->championStats;
    }

    /**
     * @param ChampionStat $championStats
     * @return ParticipantFrame
     */
    public function setChampionStats(ChampionStat $championStats): ParticipantFrame
    {
        $this->championStats = $championStats;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentGold(): int
    {
        return $this->currentGold;
    }

    /**
     * @param int $currentGold
     * @return ParticipantFrame
     */
    public function setCurrentGold(int $currentGold): ParticipantFrame
    {
        $this->currentGold = $currentGold;
        return $this;
    }

    /**
     * @return DamageStat
     */
    public function getDamageStats(): DamageStat
    {
        return $this->damageStats;
    }

    /**
     * @param DamageStat $damageStats
     * @return ParticipantFrame
     */
    public function setDamageStats(DamageStat $damageStats): ParticipantFrame
    {
        $this->damageStats = $damageStats;
        return $this;
    }

    /**
     * @return int
     */
    public function getGoldPerSecond(): int
    {
        return $this->goldPerSecond;
    }

    /**
     * @param int $goldPerSecond
     * @return ParticipantFrame
     */
    public function setGoldPerSecond(int $goldPerSecond): ParticipantFrame
    {
        $this->goldPerSecond = $goldPerSecond;
        return $this;
    }

    /**
     * @return int
     */
    public function getJungleMinionsKilled(): int
    {
        return $this->jungleMinionsKilled;
    }

    /**
     * @param int $jungleMinionsKilled
     * @return ParticipantFrame
     */
    public function setJungleMinionsKilled(int $jungleMinionsKilled): ParticipantFrame
    {
        $this->jungleMinionsKilled = $jungleMinionsKilled;
        return $this;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return ParticipantFrame
     */
    public function setLevel(int $level): ParticipantFrame
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinionsKilled(): int
    {
        return $this->minionsKilled;
    }

    /**
     * @param int $minionsKilled
     * @return ParticipantFrame
     */
    public function setMinionsKilled(int $minionsKilled): ParticipantFrame
    {
        $this->minionsKilled = $minionsKilled;
        return $this;
    }

    /**
     * @return int
     */
    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    /**
     * @param int $participantId
     * @return ParticipantFrame
     */
    public function setParticipantId(int $participantId): ParticipantFrame
    {
        $this->participantId = $participantId;
        return $this;
    }

    /**
     * @return Position
     */
    public function getPosition(): Position
    {
        return $this->position;
    }

    /**
     * @param Position $position
     * @return ParticipantFrame
     */
    public function setPosition(Position $position): ParticipantFrame
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeEnemySpentControlled(): int
    {
        return $this->timeEnemySpentControlled;
    }

    /**
     * @param int $timeEnemySpentControlled
     * @return ParticipantFrame
     */
    public function setTimeEnemySpentControlled(int $timeEnemySpentControlled): ParticipantFrame
    {
        $this->timeEnemySpentControlled = $timeEnemySpentControlled;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalGold(): int
    {
        return $this->totalGold;
    }

    /**
     * @param int $totalGold
     * @return ParticipantFrame
     */
    public function setTotalGold(int $totalGold): ParticipantFrame
    {
        $this->totalGold = $totalGold;
        return $this;
    }

    /**
     * @return int
     */
    public function getXp(): int
    {
        return $this->xp;
    }

    /**
     * @param int $xp
     * @return ParticipantFrame
     */
    public function setXp(int $xp): ParticipantFrame
    {
        $this->xp = $xp;
        return $this;
    }
}
