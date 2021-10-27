<?php

namespace App\Service\API\models\Matchs;

class Ban
{
    private int $championId;
    private int $pickTurn;

    /**
     * @return int
     */
    public function getChampionId(): int
    {
        return $this->championId;
    }

    /**
     * @param int $championId
     * @return Ban
     */
    public function setChampionId(int $championId): Ban
    {
        $this->championId = $championId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPickTurn(): int
    {
        return $this->pickTurn;
    }

    /**
     * @param int $pickTurn
     * @return Ban
     */
    public function setPickTurn(int $pickTurn): Ban
    {
        $this->pickTurn = $pickTurn;
        return $this;
    }
}
