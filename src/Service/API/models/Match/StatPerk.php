<?php

namespace App\Service\API\models\Match;

class StatPerk {
    private int $defense;
    private int $flex;
    private int $offense;

    /**
     * @return int
     */
    public function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * @param int $defense
     * @return StatPerk
     */
    public function setDefense(int $defense): StatPerk
    {
        $this->defense = $defense;
        return $this;
    }

    /**
     * @return int
     */
    public function getFlex(): int
    {
        return $this->flex;
    }

    /**
     * @param int $flex
     * @return StatPerk
     */
    public function setFlex(int $flex): StatPerk
    {
        $this->flex = $flex;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffense(): int
    {
        return $this->offense;
    }

    /**
     * @param int $offense
     * @return StatPerk
     */
    public function setOffense(int $offense): StatPerk
    {
        $this->offense = $offense;
        return $this;
    }
}