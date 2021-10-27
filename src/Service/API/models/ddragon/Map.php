<?php

namespace App\Service\API\models\ddragon;

class Map
{
    private int $mapId;
    private string $mapName;
    private string $notes;

    /**
     * @return int
     */
    public function getMapId(): int
    {
        return $this->mapId;
    }

    /**
     * @param int $mapId
     * @return Map
     */
    public function setMapId(int $mapId): Map
    {
        $this->mapId = $mapId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMapName(): string
    {
        return $this->mapName;
    }

    /**
     * @param string $mapName
     * @return Map
     */
    public function setMapName(string $mapName): Map
    {
        $this->mapName = $mapName;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Map
     */
    public function setNotes(string $notes): Map
    {
        $this->notes = $notes;
        return $this;
    }
}
