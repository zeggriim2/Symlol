<?php

namespace App\Service\API\models;

class Account {

    private string $puuid;
    private string $gameName;
    private string $tagLine;

    /**
     * @return string
     */
    public function getPuuid(): string
    {
        return $this->puuid;
    }

    /**
     * @param string $puuid
     * @return Account
     */
    public function setPuuid(string $puuid): Account
    {
        $this->puuid = $puuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getGameName(): string
    {
        return $this->gameName;
    }

    /**
     * @param string $gameName
     * @return Account
     */
    public function setGameName(string $gameName): Account
    {
        $this->gameName = $gameName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTagLine(): string
    {
        return $this->tagLine;
    }

    /**
     * @param string $tagLine
     * @return Account
     */
    public function setTagLine(string $tagLine): Account
    {
        $this->tagLine = $tagLine;
        return $this;
    }

}