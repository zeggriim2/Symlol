<?php


namespace App\Service\API\models;


use App\Service\API\models\Status\Status;

class PlatformData
{
    private string $id;
    private string $name;
    private array $locales;

    /**
     * @var Status[]
     */
    private array $maintenances;

    /**
     * @var Status[]
     */
    private array $incidents;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return PlatformData
     */
    public function setId(string $id): PlatformData
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return PlatformData
     */
    public function setName(string $name): PlatformData
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getLocales(): array
    {
        return $this->locales;
    }

    /**
     * @param array $locales
     * @return PlatformData
     */
    public function setLocales(array $locales): PlatformData
    {
        $this->locales = $locales;
        return $this;
    }

    /**
     * @return Status[]
     */
    public function getMaintenances(): array
    {
        return $this->maintenances;
    }

    /**
     * @param Status[] $maintenances
     * @return PlatformData
     */
    public function setMaintenances(array $maintenances): PlatformData
    {
        $this->maintenances = $maintenances;
        return $this;
    }

    /**
     * @return Status[]
     */
    public function getIncidents(): array
    {
        return $this->incidents;
    }

    /**
     * @param Status[] $incidents
     * @return PlatformData
     */
    public function setIncidents(array $incidents): PlatformData
    {
        $this->incidents = $incidents;
        return $this;
    }
}