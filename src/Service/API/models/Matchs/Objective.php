<?php

namespace App\Service\API\models\Matchs;

class Objective
{
    private bool $first;
    private int $kills;

    /**
     * @return bool
     */
    public function isFirst(): bool
    {
        return $this->first;
    }

    /**
     * @param bool $first
     * @return Objective
     */
    public function setFirst(bool $first): Objective
    {
        $this->first = $first;
        return $this;
    }

    /**
     * @return int
     */
    public function getKills(): int
    {
        return $this->kills;
    }

    /**
     * @param int $kills
     * @return Objective
     */
    public function setKills(int $kills): Objective
    {
        $this->kills = $kills;
        return $this;
    }
}
