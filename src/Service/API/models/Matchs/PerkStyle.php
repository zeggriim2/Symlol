<?php

namespace App\Service\API\models\Matchs;

class PerkStyle
{

    private string $description;
    /**
     * @var PerkStyleSelection[]
     */
    private array $selections;
    private int $style;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return PerkStyle
     */
    public function setDescription(string $description): PerkStyle
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSelections()
    {
        return $this->selections;
    }

    /**
     * @param mixed $selections
     * @return PerkStyle
     */
    public function setSelections($selections)
    {
        $this->selections = $selections;
        return $this;
    }

    /**
     * @return int
     */
    public function getStyle(): int
    {
        return $this->style;
    }

    /**
     * @param int $style
     * @return PerkStyle
     */
    public function setStyle(int $style): PerkStyle
    {
        $this->style = $style;
        return $this;
    }
}
