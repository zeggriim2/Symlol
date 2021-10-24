<?php

namespace App\Service\API\models;

use App\Service\API\models\Match\Info;
use App\Service\API\models\Match\Metadata;

class Match {

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
     * @return Match
     */
    public function setMetadata(Metadata $metadata): Match
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
     * @return Match
     */
    public function setInfo(Info $info): Match
    {
        $this->info = $info;
        return $this;
    }
}