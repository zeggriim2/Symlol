<?php


namespace App\Service\API\models\MatchTimeLine;


class Position
{
    private int $x;
    private int $y;

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     * @return Position
     */
    public function setX(int $x): Position
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     * @return Position
     */
    public function setY(int $y): Position
    {
        $this->y = $y;
        return $this;
    }
}