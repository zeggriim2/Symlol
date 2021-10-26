<?php


namespace App\Service\API\models\MatchTimeLine;


class Participant
{
    private int $participantId;
    private string $puuid;

    /**
     * @return int
     */
    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    /**
     * @param int $participantId
     * @return Participant
     */
    public function setParticipantId(int $participantId): Participant
    {
        $this->participantId = $participantId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPuuid(): string
    {
        return $this->puuid;
    }

    /**
     * @param string $puuid
     * @return Participant
     */
    public function setPuuid(string $puuid): Participant
    {
        $this->puuid = $puuid;
        return $this;
    }
}