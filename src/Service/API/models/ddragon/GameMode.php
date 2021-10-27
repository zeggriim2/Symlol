<?php

namespace App\Service\API\models\ddragon;

class GameMode
{
    private string $gameMode;
    private string $description;

    /**
     * @return string
     */
    public function getGameMode(): string
    {
        return $this->gameMode;
    }

    /**
     * @param string $gameMode
     * @return GameMode
     */
    public function setGameMode(string $gameMode): GameMode
    {
        $this->gameMode = $gameMode;
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
     * @return GameMode
     */
    public function setDescription(string $description): GameMode
    {
        $this->description = $description;
        return $this;
    }
}
