<?php


namespace App\Service\API\models\MatchTimeLine;


class Frame
{
    /**
     * @var Event[]
     */
    private array $events;
    /**
     * @var ParticipantFrame[]
     */
    private array $participantFrames;
    private int $timestamp;

    /**
     * @return Event[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @return ParticipantFrame[]
     */
    public function getParticipantFrames(): array
    {
        return $this->participantFrames;
    }

    /**
     * @param ParticipantFrame[] $participantFrames
     * @return Frame
     */
    public function setParticipantFrames(array $participantFrames): Frame
    {
        $this->participantFrames = $participantFrames;
        return $this;
    }

    /**
     * @param Event[] $events
     * @return Frame
     */
    public function setEvents(array $events): Frame
    {
        $this->events = $events;
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
     * @return Frame
     */
    public function setTimestamp(int $timestamp): Frame
    {
        $this->timestamp = $timestamp;
        return $this;
    }
}