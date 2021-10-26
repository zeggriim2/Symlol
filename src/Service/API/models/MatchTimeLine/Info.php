<?php


namespace App\Service\API\models\MatchTimeLine;


class Info
{
    private int $frameInterval;
    /**
     * @var Frame[]
     */
    private array $frames;
    private int $gameId;
    /**
     * @var Participant[]
     */
    private array $participants;

    /**
     * @return int
     */
    public function getFrameInterval(): int
    {
        return $this->frameInterval;
    }

    /**
     * @param int $frameInterval
     * @return Info
     */
    public function setFrameInterval(int $frameInterval): Info
    {
        $this->frameInterval = $frameInterval;
        return $this;
    }

    /**
     * @return Frame[]
     */
    public function getFrames(): array
    {
        return $this->frames;
    }

    /**
     * @param Frame[] $frames
     * @return Info
     */
    public function setFrames(array $frames): Info
    {
        $this->frames = $frames;
        return $this;
    }

    /**
     * @return int
     */
    public function getGameId(): int
    {
        return $this->gameId;
    }

    /**
     * @param int $gameId
     * @return Info
     */
    public function setGameId(int $gameId): Info
    {
        $this->gameId = $gameId;
        return $this;
    }

    /**
     * @return Participant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param Participant[] $participants
     * @return Info
     */
    public function setParticipants(array $participants): Info
    {
        $this->participants = $participants;
        return $this;
    }
}