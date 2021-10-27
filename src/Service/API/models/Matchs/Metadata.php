<?php

namespace App\Service\API\models\Matchs;

class Metadata
{
    private string $dataVersion;
    private string $matchId;
    /**
     * @var string[]
     */
    private array $participants;

    /**
     * @return string
     */
    public function getDataVersion(): string
    {
        return $this->dataVersion;
    }

    /**
     * @param string $dataVersion
     * @return Metadata
     */
    public function setDataVersion(string $dataVersion): Metadata
    {
        $this->dataVersion = $dataVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getMatchId(): string
    {
        return $this->matchId;
    }

    /**
     * @param string $matchId
     * @return Metadata
     */
    public function setMatchId(string $matchId): Metadata
    {
        $this->matchId = $matchId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @param mixed $participants
     * @return Metadata
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
        return $this;
    }
}
