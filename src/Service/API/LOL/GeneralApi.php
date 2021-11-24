<?php

namespace App\Service\API\LOL;

use App\Service\API\models\ddragon\GameMode;
use App\Service\API\models\ddragon\GameType;
use App\Service\API\models\ddragon\Map;
use App\Service\API\models\ddragon\Queue;
use App\Service\API\models\ddragon\Season;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class GeneralApi
{
    private const API_URL_SEASONS = "seasons.json";
    private const API_URL_QUEUES = "queues.json";
    private const API_URL_MAPS = "maps.json";
    private const API_URL_GAMEMODES = "gameModes.json";
    private const API_URL_GAMETYPES = "gameTypes.json";

    private const API_URL_LANGUAGES = "languages.json";
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
     * Recupere la liste des saisons
     *
     * @return array<Season>|null
     */
    public function getSeason(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_SEASONS);
        $listSeason = $this->baseApi->callApi($url);

        if ($listSeason === null) {
            return null;
        }

        return $this->denormalize($listSeason, Season::class);
    }

    /**
     * @return array<Queue>|null
     */
    public function getQueues(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_QUEUES);
        $listQueue = $this->baseApi->callApi($url);

        if ($listQueue === null) {
            return null;
        }

        return $this->denormalize($listQueue, Queue::class);
    }

    /**
     * @return array<Map>|null
     */
    public function getMaps(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_MAPS);
        $listMap = $this->baseApi->callApi($url);

        if ($listMap === null) {
            return $listMap;
        }

         return $this->denormalize($listMap, Map::class);
    }

    /**
     * @return array<GameMode>|null
     */
    public function getGameModes(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_GAMEMODES);
        $listGameMode = $this->baseApi->callApi($url);

        if ($listGameMode === null) {
            return null;
        }

        return $this->denormalize($listGameMode, GameMode::class);
    }

    /**
     * @return array<GameType>|null
     */
    public function getGameTypes(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_GAMETYPES);
        $listGameType = $this->baseApi->callApi($url);

        if ($listGameType === null) {
            return null;
        }

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
        $url = $this->buildUrlDdragon(self::API_URL_LANGUAGES);
        return $this->baseApi->callApiCache($url);
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
        foreach ($listes as $liste) {
            $listeObj[] = $this->denormalizer->denormalize($liste, $instance);
        }
        return $listeObj;
    }
}
