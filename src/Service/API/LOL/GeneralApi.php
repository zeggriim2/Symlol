<?php

namespace App\Service\API\LOL;

class GeneralApi extends BaseApi {

    const BASE_URL_STATIC = "http://static.developer.riotgames.com/docs/lol/";
    const API_URL_SEASONS = "seasons.json";
    const API_URL_QUEUES = "queues.json";
    const API_URL_MAPS = "maps.json";
    const API_URL_GAMEMODES = "gameModes.json";
    const API_URL_GAMETYPES = "gameTypes.json";

    const BASE_URL_DDRAGON = "https://ddragon.leagueoflegends.com/api/";
    const API_URL_VERSIONS = "versions.json";

    const LIEN_URL = [
        self::BASE_URL_STATIC => [
            self::API_URL_SEASONS,
            self::API_URL_QUEUES,
            self::API_URL_MAPS,
            self::API_URL_GAMEMODES,
            self::API_URL_GAMETYPES
        ],
        self::BASE_URL_DDRAGON => [
            self::API_URL_VERSIONS
        ]
    ];


    /**
     * @return array<string
|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getSeason(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_SEASONS);
        return $this->callApi($url);
    }

    /**
     * @return array<string
|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getQueues(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_QUEUES);
        return $this->callApi($url);
    }

    /**
     * @return array<string
|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getMaps(): ?array
    {
        $url = $this->buildUrlStatic(self::API_URL_MAPS);
        return $this->callApi($url);
    }

    /**
     * @return array<string
|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getsGameModes(): ?array
    {
        return $this->callApi(self::API_URL_GAMEMODES);
    }

    /**
     * @return array<string
|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getsGameTypes()
    {
        return $this->callApi(self::API_URL_GAMETYPES);
    }

    /**
     * @return array<string
|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getVersions()
    {
        $url = $this->buildUrlDdragon(self::API_URL_VERSIONS);
        return $this->callApi($url);
    }

//    public function getLastVersion()
//    {
//        $versions = $this->getVersions();
//        return $versions[0];
//    }

    private function buildUrlStatic(string $endUrl): string
    {
        return self::BASE_URL_STATIC . $endUrl;
    }

    private function buildUrlDdragon(string $endUrl): string
    {
        return self::BASE_URL_DDRAGON . $endUrl;
    }

}