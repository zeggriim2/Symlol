<?php

namespace App\Service\API\models\ddragon;

class GameType
{
    private string $gameType;
    private string $description;

    /**
     * @return string
     */
    public function getGameType(): string
    {
        return $this->gameType;
    }

    /**
     * @param string $gameType
     * @return GameType
     */
    public function setGameType(string $gameType): GameType
    {
        $this->gameType = $gameType;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return GameType
     */
    public function setDescription(string $description): GameType
    {
        $this->description = $description;
        return $this;
    }
}
