<?php

namespace App\Service\API\LOL;



class ApiClient {

    const REGION_BR   = 'br';
    const REGION_EUNE = 'eune';
    const REGION_EUW  = 'euw';
    const REGION_JP   = 'jp';
    const REGION_KR   = 'kr';
    const REGION_LAN  = 'lan';
    const REGION_LAS  = 'las';
    const REGION_NA   = 'na';
    const REGION_OCE  = 'oce';
    const REGION_TR   = 'tr';
    const REGION_RU   = 'ru';

    const REGION_BR_ID   = 'br1';
    const REGION_EUNE_ID = 'eun1';
    const REGION_EUW_ID  = 'euw1';
    const REGION_JP_ID   = 'jp1';
    const REGION_KR_ID   = 'kr';
    const REGION_LAN_ID  = 'la1';
    const REGION_LAS_ID  = 'la2';
    const REGION_NA_ID   = 'na1';
    const REGION_OCE_ID  = 'oc1';
    const REGION_TR_ID   = 'tr1';
    const REGION_RU_ID   = 'ru';

    const LANG = [
        'cs_CZ',
        'el_GR',
        'pl_PL',
        'ro_RO',
        'hu_HU',
        'en_GB',
        'de_DE',
        'es_ES',
        'it_IT',
        'fr_FR',
        'ja_JP',
        'ko_KR',
        'es_MX',
        'es_AR',
        'pt_BR',
        'en_US',
        'en_AU',
        'ru_RU',
        'tr_TR',
        'ms_MY',
        'en_PH',
        'en_SG',
        'th_TH',
        'vn_VN',
        'id_ID',
        'zh_MY',
        'zh_CN',
        'zh_TW',
    ];

    /**
     * @var array
     */
    public static $availableRegions = [
        self::REGION_BR,
        self::REGION_EUNE,
        self::REGION_EUW,
        self::REGION_JP,
        self::REGION_KR,
        self::REGION_LAN,
        self::REGION_LAS,
        self::REGION_NA,
        self::REGION_OCE,
        self::REGION_RU,
        self::REGION_TR,
    ];

    public static $regionsWithIds = [
        self::REGION_BR   => self::REGION_BR_ID,
        self::REGION_EUNE => self::REGION_EUNE_ID,
        self::REGION_EUW  => self::REGION_EUW_ID,
        self::REGION_JP   => self::REGION_JP_ID,
        self::REGION_KR   => self::REGION_KR_ID,
        self::REGION_LAN  => self::REGION_LAN_ID,
        self::REGION_LAS  => self::REGION_LAS_ID,
        self::REGION_NA   => self::REGION_NA_ID,
        self::REGION_OCE  => self::REGION_OCE_ID,
        self::REGION_RU   => self::REGION_RU_ID,
        self::REGION_TR   => self::REGION_TR_ID,
    ];



    /**
     * @var string
     */
    private $region;
    /**
     * @var string
     */
    private $apiKey;

    /*
     * @var string
     */
    protected  $version;

    protected $lang;


    /**
     * ApiClient constructor.
     * @param string $region
     * @param string $apiKey
     * @param string $version
     * @param string $lang
     */
    public function __construct(string $apiKey, string $region = null, string $lang = null, string $version = null)
    {
        $this->apiKey = $apiKey;
        $this->region = $region ? $region : 'euw';
        $this->version = $version ? $version : '11.11.1'  ;
        $this->lang = $lang ? $lang : 'fr_FR';
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function championApi()
    {
        return new ChampionApi($this);
    }

//    public function generalApi()
//    {
//        return new GeneralApi($this);
//    }


    /* PRIVATE FUNCTION */
//    private function checkLang($lang)
//    {
//        return in_array($lang, self::LANG) ?: false;
//    }
//
//    private function checkVersion($version)
//    {
//
//        $versions = (array) (new GeneralApi($this))->getVersions();
//        return in_array($version, $versions) ?: false;
//    }
}