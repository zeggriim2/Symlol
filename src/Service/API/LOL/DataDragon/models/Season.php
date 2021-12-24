<?php

namespace App\Service\API\LOL\DataDragon\models;

class Season {

    private int $id;
    private string $season;

    public function getId()
    {
        $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getSeason()
    {
        $this->season;
    }

    public function setSeason(string $season)
    {
        $this->season = $season;
    }

}