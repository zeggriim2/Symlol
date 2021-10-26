<?php


namespace App\Service\API\models\MatchTimeLine;


class DamageStat
{
    private int $magicDamageDone;
    private int $magicDamageDoneToChampions;
    private int $magicDamageTaken;
    private int $physicalDamageDone;
    private int $physicalDamageDoneToChampions;
    private int $physicalDamageTaken;
    private int $totalDamageDone;
    private int $totalDamageDoneToChampions;
    private int $totalDamageTaken;
    private int $trueDamageDone;
    private int $trueDamageDoneToChampions;
    private int $trueDamageTaken;

    /**
     * @return int
     */
    public function getMagicDamageDone(): int
    {
        return $this->magicDamageDone;
    }

    /**
     * @param int $magicDamageDone
     * @return DamageStat
     */
    public function setMagicDamageDone(int $magicDamageDone): DamageStat
    {
        $this->magicDamageDone = $magicDamageDone;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagicDamageDoneToChampions(): int
    {
        return $this->magicDamageDoneToChampions;
    }

    /**
     * @param int $magicDamageDoneToChampions
     * @return DamageStat
     */
    public function setMagicDamageDoneToChampions(int $magicDamageDoneToChampions): DamageStat
    {
        $this->magicDamageDoneToChampions = $magicDamageDoneToChampions;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagicDamageTaken(): int
    {
        return $this->magicDamageTaken;
    }

    /**
     * @param int $magicDamageTaken
     * @return DamageStat
     */
    public function setMagicDamageTaken(int $magicDamageTaken): DamageStat
    {
        $this->magicDamageTaken = $magicDamageTaken;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalDamageDone(): int
    {
        return $this->physicalDamageDone;
    }

    /**
     * @param int $physicalDamageDone
     * @return DamageStat
     */
    public function setPhysicalDamageDone(int $physicalDamageDone): DamageStat
    {
        $this->physicalDamageDone = $physicalDamageDone;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalDamageDoneToChampions(): int
    {
        return $this->physicalDamageDoneToChampions;
    }

    /**
     * @param int $physicalDamageDoneToChampions
     * @return DamageStat
     */
    public function setPhysicalDamageDoneToChampions(int $physicalDamageDoneToChampions): DamageStat
    {
        $this->physicalDamageDoneToChampions = $physicalDamageDoneToChampions;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalDamageTaken(): int
    {
        return $this->physicalDamageTaken;
    }

    /**
     * @param int $physicalDamageTaken
     * @return DamageStat
     */
    public function setPhysicalDamageTaken(int $physicalDamageTaken): DamageStat
    {
        $this->physicalDamageTaken = $physicalDamageTaken;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalDamageDone(): int
    {
        return $this->totalDamageDone;
    }

    /**
     * @param int $totalDamageDone
     * @return DamageStat
     */
    public function setTotalDamageDone(int $totalDamageDone): DamageStat
    {
        $this->totalDamageDone = $totalDamageDone;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalDamageDoneToChampions(): int
    {
        return $this->totalDamageDoneToChampions;
    }

    /**
     * @param int $totalDamageDoneToChampions
     * @return DamageStat
     */
    public function setTotalDamageDoneToChampions(int $totalDamageDoneToChampions): DamageStat
    {
        $this->totalDamageDoneToChampions = $totalDamageDoneToChampions;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalDamageTaken(): int
    {
        return $this->totalDamageTaken;
    }

    /**
     * @param int $totalDamageTaken
     * @return DamageStat
     */
    public function setTotalDamageTaken(int $totalDamageTaken): DamageStat
    {
        $this->totalDamageTaken = $totalDamageTaken;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrueDamageDone(): int
    {
        return $this->trueDamageDone;
    }

    /**
     * @param int $trueDamageDone
     * @return DamageStat
     */
    public function setTrueDamageDone(int $trueDamageDone): DamageStat
    {
        $this->trueDamageDone = $trueDamageDone;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrueDamageDoneToChampions(): int
    {
        return $this->trueDamageDoneToChampions;
    }

    /**
     * @param int $trueDamageDoneToChampions
     * @return DamageStat
     */
    public function setTrueDamageDoneToChampions(int $trueDamageDoneToChampions): DamageStat
    {
        $this->trueDamageDoneToChampions = $trueDamageDoneToChampions;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrueDamageTaken(): int
    {
        return $this->trueDamageTaken;
    }

    /**
     * @param int $trueDamageTaken
     * @return DamageStat
     */
    public function setTrueDamageTaken(int $trueDamageTaken): DamageStat
    {
        $this->trueDamageTaken = $trueDamageTaken;
        return $this;
    }
}