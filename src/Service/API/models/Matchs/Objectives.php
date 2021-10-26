<?php

namespace App\Service\API\models\Matchs;

class Objectives
{
    private Objective $baron;
    private Objective $champion;
    private Objective $dragon;
    private Objective $inhibitor;
    private Objective $riftHerald;
    private Objective $tower;

    /**
     * @return Objective
     */
    public function getBaron(): Objective
    {
        return $this->baron;
    }

    /**
     * @param Objective $baron
     * @return Objectives
     */
    public function setBaron(Objective $baron): Objectives
    {
        $this->baron = $baron;
        return $this;
    }

    /**
     * @return Objective
     */
    public function getChampion(): Objective
    {
        return $this->champion;
    }

    /**
     * @param Objective $champion
     * @return Objectives
     */
    public function setChampion(Objective $champion): Objectives
    {
        $this->champion = $champion;
        return $this;
    }

    /**
     * @return Objective
     */
    public function getDragon(): Objective
    {
        return $this->dragon;
    }

    /**
     * @param Objective $dragon
     * @return Objectives
     */
    public function setDragon(Objective $dragon): Objectives
    {
        $this->dragon = $dragon;
        return $this;
    }

    /**
     * @return Objective
     */
    public function getInhibitor(): Objective
    {
        return $this->inhibitor;
    }

    /**
     * @param Objective $inhibitor
     * @return Objectives
     */
    public function setInhibitor(Objective $inhibitor): Objectives
    {
        $this->inhibitor = $inhibitor;
        return $this;
    }

    /**
     * @return Objective
     */
    public function getRiftHerald(): Objective
    {
        return $this->riftHerald;
    }

    /**
     * @param Objective $riftHerald
     * @return Objectives
     */
    public function setRiftHerald(Objective $riftHerald): Objectives
    {
        $this->riftHerald = $riftHerald;
        return $this;
    }

    /**
     * @return Objective
     */
    public function getTower(): Objective
    {
        return $this->tower;
    }

    /**
     * @param Objective $tower
     * @return Objectives
     */
    public function setTower(Objective $tower): Objectives
    {
        $this->tower = $tower;
        return $this;
    }
}