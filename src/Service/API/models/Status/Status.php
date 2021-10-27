<?php

namespace App\Service\API\models\Status;

class Status
{
    private int $id;
    private string $maintenance_status;
    private string $incident_severity;

    /**
     * @var Content[]
     */
    private array $titles;

    /**
     * @var Update[]
     */
    private array $updates;
    private string $created_at;
    private string $archive_at;
    private string $updated_at;

    /**
     * @var string[]
     */
    private array $platforms;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Status
     */
    public function setId(int $id): Status
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMaintenanceStatus(): string
    {
        return $this->maintenance_status;
    }

    /**
     * @param string $maintenance_status
     * @return Status
     */
    public function setMaintenanceStatus(string $maintenance_status): Status
    {
        $this->maintenance_status = $maintenance_status;
        return $this;
    }

    /**
     * @return string
     */
    public function getIncidentSeverity(): string
    {
        return $this->incident_severity;
    }

    /**
     * @param string $incident_severity
     * @return Status
     */
    public function setIncidentSeverity(string $incident_severity): Status
    {
        $this->incident_severity = $incident_severity;
        return $this;
    }

    /**
     * @return Content[]
     */
    public function getTitles(): array
    {
        return $this->titles;
    }

    /**
     * @param Content[] $titles
     * @return Status
     */
    public function setTitles(array $titles): Status
    {
        $this->titles = $titles;
        return $this;
    }

    /**
     * @return Update[]
     */
    public function getUpdates(): array
    {
        return $this->updates;
    }

    /**
     * @param Update[] $updates
     * @return Status
     */
    public function setUpdates(array $updates): Status
    {
        $this->updates = $updates;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     * @return Status
     */
    public function setCreatedAt(string $created_at): Status
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getArchiveAt(): string
    {
        return $this->archive_at;
    }

    /**
     * @param string $archive_at
     * @return Status
     */
    public function setArchiveAt(string $archive_at): Status
    {
        $this->archive_at = $archive_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     * @return Status
     */
    public function setUpdatedAt(string $updated_at): Status
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getPlatforms(): array
    {
        return $this->platforms;
    }

    /**
     * @param string[] $platforms
     * @return Status
     */
    public function setPlatforms(array $platforms): Status
    {
        $this->platforms = $platforms;
        return $this;
    }
}
