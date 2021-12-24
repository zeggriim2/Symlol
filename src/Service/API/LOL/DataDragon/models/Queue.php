<?php

namespace App\Service\API\LOL\DataDragon\models;

class Queue {

    private int $queueId;
    private string $map;
    private ?string $description;
    private ?string $notes;

    public function getQueueId()
    {
        $this->queueId;
    }

    public function setQueueId(int $queueId)
    {
        $this->queueId = $queueId;
    }

    public function getMap()
    {
        $this->map;
    }

    public function setMap(string $map)
    {
        $this->map = $map;
    }

    public function getDescription()
    {
        $this->description;
    }

    public function setDescription(?string $description)
    {
        $this->description = $description;
    }

    public function getNotes()
    {
        $this->notes;
    }

    public function setNotes(?string $notes)
    {
        $this->notes = $notes;
    }

}