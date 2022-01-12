<?php

namespace App\Service\API\models\Matchs;

class Team
{
    /**
     * @var Ban[]
     */
    private array $bans;
    private Objectives $objectives;
    private int $teamId;
    private bool $win;

    /**
     * @return Ban[]
     */
    public function getBans(): array
    {
        return $this->bans;
    }

    /**
     * @param Ban[] $bans
     * @return Team
     */
    public function setBans(array $bans): Team
    {
        $this->bans = $bans;
        return $this;
    }

    /**
     * @return Objectives
     */
    public function getObjectives(): Objectives
    {
        return $this->objectives;
    }

    /**
     * @param Objectives $objectives
     * @return Team
     */
    public function setObjectives(Objectives $objectives): Team
    {
        $this->objectives = $objectives;
        return $this;
    }

    /**
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->teamId;
    }

    /**
     * @param int $teamId
     * @return Team
     */
    public function setTeamId(int $teamId): Team
    {
        $this->teamId = $teamId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isWin(): bool
    {
        return $this->win;
    }

    /**
     * @param bool $win
     * @return Team
     */
    public function setWin(bool $win): Team
    {
        $this->win = $win;
        return $this;
    }
}
