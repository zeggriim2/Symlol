<?php

namespace App\Service\API\models\MatchTimeLine;

class ChampionStat
{
    private int $abilityHaste;
    private int $abilityPower;
    private int $armor;
    private int $armorPen;
    private int $armorPenPercent;
    private int $attackDamage;
    private int $attackSpeed;
    private int $bonusArmorPenPercent;
    private int $bonusMagicPenPercent;
    private int $ccReduction;
    private int $cooldownReduction;
    private int $health;
    private int $healthMax;
    private int $healthRegen;
    private int $lifesteal;
    private int $magicPen;
    private int $magicPenPercent;
    private int $magicResist;
    private int $movementSpeed;
    private int $omnivamp;
    private int $physicalVamp;
    private int $power;
    private int $powerMax;
    private int $powerRegen;
    private int $spellVamp;

    /**
     * @return int
     */
    public function getAbilityHaste(): int
    {
        return $this->abilityHaste;
    }

    /**
     * @param int $abilityHaste
     * @return ChampionStat
     */
    public function setAbilityHaste(int $abilityHaste): ChampionStat
    {
        $this->abilityHaste = $abilityHaste;
        return $this;
    }

    /**
     * @return int
     */
    public function getAbilityPower(): int
    {
        return $this->abilityPower;
    }

    /**
     * @param int $abilityPower
     * @return ChampionStat
     */
    public function setAbilityPower(int $abilityPower): ChampionStat
    {
        $this->abilityPower = $abilityPower;
        return $this;
    }

    /**
     * @return int
     */
    public function getArmor(): int
    {
        return $this->armor;
    }

    /**
     * @param int $armor
     * @return ChampionStat
     */
    public function setArmor(int $armor): ChampionStat
    {
        $this->armor = $armor;
        return $this;
    }

    /**
     * @return int
     */
    public function getArmorPen(): int
    {
        return $this->armorPen;
    }

    /**
     * @param int $armorPen
     * @return ChampionStat
     */
    public function setArmorPen(int $armorPen): ChampionStat
    {
        $this->armorPen = $armorPen;
        return $this;
    }

    /**
     * @return int
     */
    public function getArmorPenPercent(): int
    {
        return $this->armorPenPercent;
    }

    /**
     * @param int $armorPenPercent
     * @return ChampionStat
     */
    public function setArmorPenPercent(int $armorPenPercent): ChampionStat
    {
        $this->armorPenPercent = $armorPenPercent;
        return $this;
    }

    /**
     * @return int
     */
    public function getAttackDamage(): int
    {
        return $this->attackDamage;
    }

    /**
     * @param int $attackDamage
     * @return ChampionStat
     */
    public function setAttackDamage(int $attackDamage): ChampionStat
    {
        $this->attackDamage = $attackDamage;
        return $this;
    }

    /**
     * @return int
     */
    public function getAttackSpeed(): int
    {
        return $this->attackSpeed;
    }

    /**
     * @param int $attackSpeed
     * @return ChampionStat
     */
    public function setAttackSpeed(int $attackSpeed): ChampionStat
    {
        $this->attackSpeed = $attackSpeed;
        return $this;
    }

    /**
     * @return int
     */
    public function getBonusArmorPenPercent(): int
    {
        return $this->bonusArmorPenPercent;
    }

    /**
     * @param int $bonusArmorPenPercent
     * @return ChampionStat
     */
    public function setBonusArmorPenPercent(int $bonusArmorPenPercent): ChampionStat
    {
        $this->bonusArmorPenPercent = $bonusArmorPenPercent;
        return $this;
    }

    /**
     * @return int
     */
    public function getBonusMagicPenPercent(): int
    {
        return $this->bonusMagicPenPercent;
    }

    /**
     * @param int $bonusMagicPenPercent
     * @return ChampionStat
     */
    public function setBonusMagicPenPercent(int $bonusMagicPenPercent): ChampionStat
    {
        $this->bonusMagicPenPercent = $bonusMagicPenPercent;
        return $this;
    }

    /**
     * @return int
     */
    public function getCcReduction(): int
    {
        return $this->ccReduction;
    }

    /**
     * @param int $ccReduction
     * @return ChampionStat
     */
    public function setCcReduction(int $ccReduction): ChampionStat
    {
        $this->ccReduction = $ccReduction;
        return $this;
    }

    /**
     * @return int
     */
    public function getCooldownReduction(): int
    {
        return $this->cooldownReduction;
    }

    /**
     * @param int $cooldownReduction
     * @return ChampionStat
     */
    public function setCooldownReduction(int $cooldownReduction): ChampionStat
    {
        $this->cooldownReduction = $cooldownReduction;
        return $this;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     * @return ChampionStat
     */
    public function setHealth(int $health): ChampionStat
    {
        $this->health = $health;
        return $this;
    }

    /**
     * @return int
     */
    public function getHealthMax(): int
    {
        return $this->healthMax;
    }

    /**
     * @param int $healthMax
     * @return ChampionStat
     */
    public function setHealthMax(int $healthMax): ChampionStat
    {
        $this->healthMax = $healthMax;
        return $this;
    }

    /**
     * @return int
     */
    public function getHealthRegen(): int
    {
        return $this->healthRegen;
    }

    /**
     * @param int $healthRegen
     * @return ChampionStat
     */
    public function setHealthRegen(int $healthRegen): ChampionStat
    {
        $this->healthRegen = $healthRegen;
        return $this;
    }

    /**
     * @return int
     */
    public function getLifesteal(): int
    {
        return $this->lifesteal;
    }

    /**
     * @param int $lifesteal
     * @return ChampionStat
     */
    public function setLifesteal(int $lifesteal): ChampionStat
    {
        $this->lifesteal = $lifesteal;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagicPen(): int
    {
        return $this->magicPen;
    }

    /**
     * @param int $magicPen
     * @return ChampionStat
     */
    public function setMagicPen(int $magicPen): ChampionStat
    {
        $this->magicPen = $magicPen;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagicPenPercent(): int
    {
        return $this->magicPenPercent;
    }

    /**
     * @param int $magicPenPercent
     * @return ChampionStat
     */
    public function setMagicPenPercent(int $magicPenPercent): ChampionStat
    {
        $this->magicPenPercent = $magicPenPercent;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagicResist(): int
    {
        return $this->magicResist;
    }

    /**
     * @param int $magicResist
     * @return ChampionStat
     */
    public function setMagicResist(int $magicResist): ChampionStat
    {
        $this->magicResist = $magicResist;
        return $this;
    }

    /**
     * @return int
     */
    public function getMovementSpeed(): int
    {
        return $this->movementSpeed;
    }

    /**
     * @param int $movementSpeed
     * @return ChampionStat
     */
    public function setMovementSpeed(int $movementSpeed): ChampionStat
    {
        $this->movementSpeed = $movementSpeed;
        return $this;
    }

    /**
     * @return int
     */
    public function getOmnivamp(): int
    {
        return $this->omnivamp;
    }

    /**
     * @param int $omnivamp
     * @return ChampionStat
     */
    public function setOmnivamp(int $omnivamp): ChampionStat
    {
        $this->omnivamp = $omnivamp;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalVamp(): int
    {
        return $this->physicalVamp;
    }

    /**
     * @param int $physicalVamp
     * @return ChampionStat
     */
    public function setPhysicalVamp(int $physicalVamp): ChampionStat
    {
        $this->physicalVamp = $physicalVamp;
        return $this;
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @param int $power
     * @return ChampionStat
     */
    public function setPower(int $power): ChampionStat
    {
        $this->power = $power;
        return $this;
    }

    /**
     * @return int
     */
    public function getPowerMax(): int
    {
        return $this->powerMax;
    }

    /**
     * @param int $powerMax
     * @return ChampionStat
     */
    public function setPowerMax(int $powerMax): ChampionStat
    {
        $this->powerMax = $powerMax;
        return $this;
    }

    /**
     * @return int
     */
    public function getPowerRegen(): int
    {
        return $this->powerRegen;
    }

    /**
     * @param int $powerRegen
     * @return ChampionStat
     */
    public function setPowerRegen(int $powerRegen): ChampionStat
    {
        $this->powerRegen = $powerRegen;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpellVamp(): int
    {
        return $this->spellVamp;
    }

    /**
     * @param int $spellVamp
     * @return ChampionStat
     */
    public function setSpellVamp(int $spellVamp): ChampionStat
    {
        $this->spellVamp = $spellVamp;
        return $this;
    }
}
