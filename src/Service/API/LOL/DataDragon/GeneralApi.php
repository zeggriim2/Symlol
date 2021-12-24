<?php

namespace App\Service\API\LOL\DataDragon;

use App\Service\API\LOL\BaseApi;
use App\Service\API\LOL\DataDragon\models\GameMode;
use App\Service\API\LOL\DataDragon\models\GameType;
use App\Service\API\LOL\DataDragon\models\Map;
use App\Service\API\LOL\DataDragon\models\Queue;
use App\Service\API\LOL\DataDragon\models\Season;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class GeneralApi
{
    private const API_URL_SEASONS = "seasons.json";
    private const API_URL_QUEUES = "queues.json";
    private const API_URL_MAPS = "maps.json";
    private const API_URL_GAMEMODES = "gameModes.json";
    private const API_URL_GAMETYPES = "gameTypes.json";

    private const API_URL_LANGUAGES = "https://ddragon.leagueoflegends.com/cdn/languages.json";
    private const API_URL_VERSIONS = "versions.json";

    private const BASE_URL_STATIC = "http://static.developer.riotgames.com/docs/lol/";
    private const BASE_URL_DDRAGON = "https://ddragon.leagueoflegends.com/api/";
    
    public const LIEN_URL = [
        self::BASE_URL_STATIC => [
            self::API_URL_SEASONS,
            self::API_URL_QUEUES,
            self::API_URL_MAPS,
            self::API_URL_GAMEMODES,
            self::API_URL_GAMETYPES
        ],
        self::BASE_URL_DDRAGON => [
            self::API_URL_VERSIONS,
            self::API_URL_LANGUAGES
        ]
    ];
    /**
     * @var BaseApi
     */
    private $baseApi;
    /**
     * @var DenormalizerInterface
     */
    private DenormalizerInterface $denormalizer;

    /**
     * GeneralApi constructor.
     * @param BaseApi $baseApi
     * @param DenormalizerInterface $denormalizer
     */
    public function __construct(
        BaseApi $baseApi,
        DenormalizerInterface $denormalizer
    ) {
        $this->baseApi = $baseApi;
        $this->denormalizer = $denormalizer;
    }


    /**
     * Recupere la liste des Seasons
     *
     * @return array<Season>|null
     */
    public function getSeason(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_SEASONS);
        $listSeason = $this->baseApi->callApi($url);

        if ($listSeason === null) return null;

        return $this->denormalize($listSeason, Season::class);
    }

    /**
     * Récupérer la liste des Queues
     * 
     * @return array<Queue>|null
     */
    public function getQueues(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_QUEUES);
        $listQueue = $this->baseApi->callApi($url);

        if ($listQueue === null) return null;

        return $this->denormalize($listQueue, Queue::class);
    }

    /**
     * Récupérer la liste des Maps
     * 
     * @return array<Map>|null
     */
    public function getMaps(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_MAPS);
        $listMap = $this->baseApi->callApi($url);

        if ($listMap === null) return $listMap;

        return $this->denormalize($listMap, Map::class);
    }

    /**
     * @return array<GamMode>|null
     */
    public function getsGameModes(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_GAMEMODES);
        $listGameMode = $this->baseApi->callApi($url);

        if ($listGameMode === null) return null;

        return $this->denormalize($listGameMode, GameMode::class);
    }

    /**
     * @return array<GameType>|null
     */
    public function getsGameTypes(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_GAMETYPES);
        $listGameType = $this->baseApi->callApi($url);

        if ($listGameType === null) return null;
        
        return $this->denormalize($listGameType, GameType::class);
    }

    /**
     * @return array<string>|null
     */
    public function getVersions(): ?array
    {
        $url = $this->buildUrlDdragon(self::API_URL_VERSIONS);
        return $this->baseApi->callApiCache($url);
    }

    /**
     * @return array<string>|null
     */
    public function getAllLanguages(): ?array
    {
        return $this->baseApi->callApiCache(self::API_URL_LANGUAGES);
    }


    private function buildUrlStatic(string $endUrl): string
    {
        return self::BASE_URL_STATIC . $endUrl;
    }

    private function buildUrlDdragon(string $endUrl): string
    {
        return self::BASE_URL_DDRAGON . $endUrl;
    }

    private function denormalize(
        array $listes,
        string $instance
    ): array {
        $listeObj = [];
        foreach ($listes as $gameMode) {
            $listeObj[] = $this->denormalizer->denormalize($gameMode, $instance);
        }
        return $listeObj;
    }
}
