<?php


namespace App\Service\API\models\MatchTimeLine;


class ParticipantsFrame
{
    private ParticipantFrame $un;
    private ParticipantFrame $deux;
    private ParticipantFrame $trois;
    private ParticipantFrame $quatre;
    private ParticipantFrame $cinq;
    private ParticipantFrame $six;
    private ParticipantFrame $sept;
    private ParticipantFrame $huit;
    private ParticipantFrame $neuf;
    private ParticipantFrame $dix;

    /**
     * @return ParticipantFrame
     */
    public function getUn(): ParticipantFrame
    {
        return $this->un;
    }

    /**
     * @param ParticipantFrame $un
     * @return ParticipantsFrame
     */
    public function setUn(ParticipantFrame $un): ParticipantsFrame
    {
        $this->un = $un;
        return $this;
    }

    /**
     * @return ParticipantFrame
     */
    public function getDeux(): ParticipantFrame
    {
        return $this->deux;
    }

    /**
     * @param ParticipantFrame $deux
     * @return ParticipantsFrame
     */
    public function setDeux(ParticipantFrame $deux): ParticipantsFrame
    {
        $this->deux = $deux;
        return $this;
    }

    /**
     * @return ParticipantFrame
     */
    public function getTrois(): ParticipantFrame
    {
        return $this->trois;
    }

    /**
     * @param ParticipantFrame $trois
     * @return ParticipantsFrame
     */
    public function setTrois(ParticipantFrame $trois): ParticipantsFrame
    {
        $this->trois = $trois;
        return $this;
    }

    /**
     * @return ParticipantFrame
     */
    public function getQuatre(): ParticipantFrame
    {
        return $this->quatre;
    }

    /**
     * @param ParticipantFrame $quatre
     * @return ParticipantsFrame
     */
    public function setQuatre(ParticipantFrame $quatre): ParticipantsFrame
    {
        $this->quatre = $quatre;
        return $this;
    }

    /**
     * @return ParticipantFrame
     */
    public function getCinq(): ParticipantFrame
    {
        return $this->cinq;
    }

    /**
     * @param ParticipantFrame $cinq
     * @return ParticipantsFrame
     */
    public function setCinq(ParticipantFrame $cinq): ParticipantsFrame
    {
        $this->cinq = $cinq;
        return $this;
    }

    /**
     * @return ParticipantFrame
     */
    public function getSix(): ParticipantFrame
    {
        return $this->six;
    }

    /**
     * @param ParticipantFrame $six
     * @return ParticipantsFrame
     */
    public function setSix(ParticipantFrame $six): ParticipantsFrame
    {
        $this->six = $six;
        return $this;
    }

    /**
     * @return ParticipantFrame
     */
    public function getSept(): ParticipantFrame
    {
        return $this->sept;
    }

    /**
     * @param ParticipantFrame $sept
     * @return ParticipantsFrame
     */
    public function setSept(ParticipantFrame $sept): ParticipantsFrame
    {
        $this->sept = $sept;
        return $this;
    }

    /**
     * @return ParticipantFrame
     */
    public function getHuit(): ParticipantFrame
    {
        return $this->huit;
    }

    /**
     * @param ParticipantFrame $huit
     * @return ParticipantsFrame
     */
    public function setHuit(ParticipantFrame $huit): ParticipantsFrame
    {
        $this->huit = $huit;
        return $this;
    }

    /**
     * @return ParticipantFrame
     */
    public function getNeuf(): ParticipantFrame
    {
        return $this->neuf;
    }

    /**
     * @param ParticipantFrame $neuf
     * @return ParticipantsFrame
     */
    public function setNeuf(ParticipantFrame $neuf): ParticipantsFrame
    {
        $this->neuf = $neuf;
        return $this;
    }

    /**
     * @return ParticipantFrame
     */
    public function getDix(): ParticipantFrame
    {
        return $this->dix;
    }

    /**
     * @param ParticipantFrame $dix
     * @return ParticipantsFrame
     */
    public function setDix(ParticipantFrame $dix): ParticipantsFrame
    {
        $this->dix = $dix;
        return $this;
    }
}