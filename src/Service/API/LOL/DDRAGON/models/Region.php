<?php


namespace App\Service\API\LOL\DDRAGON\models;


use App\Service\API\LOL\DDRAGON\Exceptions\RegionException;

class Region
{
    const BRASIL = 'br';
    const EUROPE_EAST = 'eune';
    const EUROPE_WEST = 'euw';
    const JAPAN = 'jp';
    const KOREA = 'kr';
    const LAMERICA_NORTH = 'lan';
    const LAMERICA_SOUTH = 'las';
    const NORTH_AMERICA = 'na';
    const OCEANIA = 'oce';
    const RUSSIA = 'ru';
    const TURKEY = 'tr';

    public const LIST = [
        self::BRASIL            => self::BRASIL,
        self::EUROPE_EAST       => self::EUROPE_EAST,
        self::EUROPE_WEST       => self::EUROPE_WEST,
        self::JAPAN             => self::JAPAN,
        self::KOREA             => self::KOREA,
        self::LAMERICA_NORTH    => self::LAMERICA_NORTH,
        self::LAMERICA_SOUTH    => self::LAMERICA_SOUTH,
        self::NORTH_AMERICA     => self::NORTH_AMERICA,
        self::OCEANIA           => self::OCEANIA,
        self::RUSSIA            => self::RUSSIA,
        self::TURKEY            => self::TURKEY
    ];

    public function getList(): array
    {
        return self::LIST;
    }

    public function getRegionName(string $region)
    {
        $region = strtolower($region);
        if (!isset(self::LIST[$region])){
            throw new RegionException("Invalid region. Can not find requested region");
        }

        return self::LIST[$region];
    }
}