<?php


namespace App\Service\API\models;


use App\Service\API\models\Matchs\Metadata;
use App\Service\API\models\MatchTimeLine\Info;

class MatchTimeLine
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
     * @return MatchTimeLine
     */
    public function setMetadata(Metadata $metadata): MatchTimeLine
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
     * @return MatchTimeLine
     */
    public function setInfo(Info $info): MatchTimeLine
    {
        $this->info = $info;
        return $this;
    }
}