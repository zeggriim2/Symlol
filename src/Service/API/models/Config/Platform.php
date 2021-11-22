<?php

namespace App\Service\API\models\Config;

class Platform
{
    public const BR1 = "br1";
    public const EUN1 = "eun1";
    public const EUW1 = "euw1";
    public const JP1 = "jp1";
    public const KR = "kr";
    public const LA1 = "la1";
    public const LA2 = "la2";
    public const NA1 = "na1";
    public const OC1 = "oc1";
    public const TR1 = "tr1";
    public const RU1 = "ru";

    public const ALL = [
            "BR1" => self::BR1,
            "EUN1" => self::EUN1,
            "EUW1" => self::EUW1,
            "JP1" => self::JP1,
            "LA1" => self::LA1,
            "LA2" => self::LA2,
            "NA1" => self::NA1,
            "OC1" => self::OC1,
            "TR1" => self::TR1,
            "RU1" => self::RU1
    ];
}
