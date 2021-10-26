<?php


namespace App\Service\API\models;


class ChampionRotation
{
    private int $maxNewPlayerLevel;
    /**
     * @var int[]
     */
    private array $freeChampionIdsForNewPlayers;

    /**
     * @var int[]
     */
    private array $freeChampionIds;

    /**
     * @return int
     */
    public function getMaxNewPlayerLevel(): int
    {
        return $this->maxNewPlayerLevel;
    }

    /**
     * @param int $maxNewPlayerLevel
     * @return ChampionRotation
     */
    public function setMaxNewPlayerLevel(int $maxNewPlayerLevel): ChampionRotation
    {
        $this->maxNewPlayerLevel = $maxNewPlayerLevel;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getFreeChampionIdsForNewPlayers(): array
    {
        return $this->freeChampionIdsForNewPlayers;
    }

    /**
     * @param int[] $freeChampionIdsForNewPlayers
     * @return ChampionRotation
     */
    public function setFreeChampionIdsForNewPlayers(array $freeChampionIdsForNewPlayers): ChampionRotation
    {
        $this->freeChampionIdsForNewPlayers = $freeChampionIdsForNewPlayers;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getFreeChampionIds(): array
    {
        return $this->freeChampionIds;
    }

    /**
     * @param int[] $freeChampionIds
     * @return ChampionRotation
     */
    public function setFreeChampionIds(array $freeChampionIds): ChampionRotation
    {
        $this->freeChampionIds = $freeChampionIds;
        return $this;
    }
}