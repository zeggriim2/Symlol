<?php

namespace App\Service\API\models\Match;

class Info {
    private int $gameCreation;
    private int $gameDuration;
    private int $gameEndTimestamp;
    private int $gameId;
    private string $gameMode;
    private string $gameName;
    private int $gameStartTimestamp;
    private string $gameType;
    private string $gameVersion;
    private int $mapId;
    /**
     * @var Participant[]
     */
    private array $participants;
    private string $platformId;
    private int $queueId;
    /**
     * @var Team[]
     */
    private array $teams;
    private string $tournamentCode;

    /**
     * @return int
     */
    public function getGameCreation(): int
    {
        return $this->gameCreation;
    }

    /**
     * @param int $gameCreation
     * @return Info
     */
    public function setGameCreation(int $gameCreation): Info
    {
        $this->gameCreation = $gameCreation;
        return $this;
    }

    /**
     * @return int
     */
    public function getGameDuration(): int
    {
        return $this->gameDuration;
    }

    /**
     * @param int $gameDuration
     * @return Info
     */
    public function setGameDuration(int $gameDuration): Info
    {
        $this->gameDuration = $gameDuration;
        return $this;
    }

    /**
     * @return int
     */
    public function getGameEndTimestamp(): int
    {
        return $this->gameEndTimestamp;
    }

    /**
     * @param int $gameEndTimestamp
     * @return Info
     */
    public function setGameEndTimestamp(int $gameEndTimestamp): Info
    {
        $this->gameEndTimestamp = $gameEndTimestamp;
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
     * @return string
     */
    public function getGameMode(): string
    {
        return $this->gameMode;
    }

    /**
     * @param string $gameMode
     * @return Info
     */
    public function setGameMode(string $gameMode): Info
    {
        $this->gameMode = $gameMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getGameName(): string
    {
        return $this->gameName;
    }

    /**
     * @param string $gameName
     * @return Info
     */
    public function setGameName(string $gameName): Info
    {
        $this->gameName = $gameName;
        return $this;
    }

    /**
     * @return int
     */
    public function getGameStartTimestamp(): int
    {
        return $this->gameStartTimestamp;
    }

    /**
     * @param int $gameStartTimestamp
     * @return Info
     */
    public function setGameStartTimestamp(int $gameStartTimestamp): Info
    {
        $this->gameStartTimestamp = $gameStartTimestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getGameType(): string
    {
        return $this->gameType;
    }

    /**
     * @param string $gameType
     * @return Info
     */
    public function setGameType(string $gameType): Info
    {
        $this->gameType = $gameType;
        return $this;
    }

    /**
     * @return string
     */
    public function getGameVersion(): string
    {
        return $this->gameVersion;
    }

    /**
     * @param string $gameVersion
     * @return Info
     */
    public function setGameVersion(string $gameVersion): Info
    {
        $this->gameVersion = $gameVersion;
        return $this;
    }

    /**
     * @return int
     */
    public function getMapId(): int
    {
        return $this->mapId;
    }

    /**
     * @param int $mapId
     * @return Info
     */
    public function setMapId(int $mapId): Info
    {
        $this->mapId = $mapId;
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
     * @return Info
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlatformId(): string
    {
        return $this->platformId;
    }

    /**
     * @param string $platformId
     * @return Info
     */
    public function setPlatformId(string $platformId): Info
    {
        $this->platformId = $platformId;
        return $this;
    }

    /**
     * @return int
     */
    public function getQueueId(): int
    {
        return $this->queueId;
    }

    /**
     * @param int $queueId
     * @return Info
     */
    public function setQueueId(int $queueId): Info
    {
        $this->queueId = $queueId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @param mixed $teams
     * @return Info
     */
    public function setTeams($teams)
    {
        $this->teams = $teams;
        return $this;
    }

    /**
     * @return string
     */
    public function getTournamentCode(): string
    {
        return $this->tournamentCode;
    }

    /**
     * @param string $tournamentCode
     * @return Info
     */
    public function setTournamentCode(string $tournamentCode): Info
    {
        $this->tournamentCode = $tournamentCode;
        return $this;
    }
}