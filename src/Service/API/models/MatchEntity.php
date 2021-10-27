<?php

namespace App\Service\API\models;

use App\Service\API\models\Matchs\Info;
use App\Service\API\models\Matchs\Metadata;

class MatchEntity
{

    /**
     * @var Metadata
     */
    private Metadata $metadata;

    /**
     * @var Info
     */
    private Info $info;

    /**
     * @return Metadata
     */
    public function getMetadata(): Metadata
    {
        return $this->metadata;
    }

    /**
     * @param Metadata $metadata
     * @return MatchEntity
     */
    public function setMetadata(Metadata $metadata): MatchEntity
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * @return Info
     */
    public function getInfo(): Info
    {
        return $this->info;
    }

    /**
     * @param Info $info
     * @return MatchEntity
     */
    public function setInfo(Info $info): MatchEntity
    {
        $this->info = $info;
        return $this;
    }
}
