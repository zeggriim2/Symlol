<?php


namespace App\Service\API\models\ddragon;


class Season
{
    private int $id;
    private string $season;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Season
     */
    public function setId(int $id): Season
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeason(): string
    {
        return $this->season;
    }

    /**
     * @param string $season
     * @return Season
     */
    public function setSeason(string $season): Season
    {
        $this->season = $season;
        return $this;
    }
}