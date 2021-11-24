<?php

namespace App\Service\API\models\ddragon;

class Queue
{
    private int $queueId;
    private string $map;
    private ?string $description;
    private ?string $notes;

    /**
     * @return int
     */
    public function getQueueId(): int
    {
        return $this->queueId;
    }

    /**
     * @param int $queueId
     * @return Queue
     */
    public function setQueueId(int $queueId): Queue
    {
        $this->queueId = $queueId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMap(): string
    {
        return $this->map;
    }

    /**
     * @param string $map
     * @return Queue
     */
    public function setMap(string $map): Queue
    {
        $this->map = $map;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Queue
     */
    public function setDescription(?string $description): Queue
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Queue
     */
    public function setNotes(?string $notes): Queue
    {
        $this->notes = $notes;
        return $this;
    }
}
