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
     * @return participantFrame
     */
    public function setChampionStats(ChampionStat $championStats): participantFrame
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
     * @return participantFrame
     */
    public function setCurrentGold(int $currentGold): participantFrame
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
     * @return participantFrame
     */
    public function setDamageStats(DamageStat $damageStats): participantFrame
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
     * @return participantFrame
     */
    public function setGoldPerSecond(int $goldPerSecond): participantFrame
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
     * @return participantFrame
     */
    public function setJungleMinionsKilled(int $jungleMinionsKilled): participantFrame
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
     * @return participantFrame
     */
    public function setLevel(int $level): participantFrame
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
     * @return participantFrame
     */
    public function setMinionsKilled(int $minionsKilled): participantFrame
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
     * @return participantFrame
     */
    public function setParticipantId(int $participantId): participantFrame
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
     * @return participantFrame
     */
    public function setPosition(Position $position): participantFrame
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
     * @return participantFrame
     */
    public function setTimeEnemySpentControlled(int $timeEnemySpentControlled): participantFrame
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
     * @return participantFrame
     */
    public function setTotalGold(int $totalGold): participantFrame
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
     * @return participantFrame
     */
    public function setXp(int $xp): participantFrame
    {
        $this->xp = $xp;
        return $this;
    }
}