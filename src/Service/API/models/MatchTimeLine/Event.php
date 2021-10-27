<?php

namespace App\Service\API\models\MatchTimeLine;

class Event
{
    private int $realTimestamp;
    private int $timestamp;
    private string $type;

    /**
     * @return int
     */
    public function getRealTimestamp(): int
    {
        return $this->realTimestamp;
    }

    /**
     * @param int $realTimestamp
     * @return Event
     */
    public function setRealTimestamp(int $realTimestamp): Event
    {
        $this->realTimestamp = $realTimestamp;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     * @return Event
     */
    public function setTimestamp(int $timestamp): Event
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Event
     */
    public function setType(string $type): Event
    {
        $this->type = $type;
        return $this;
    }
}
