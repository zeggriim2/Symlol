<?php

namespace App\Service\API\LOL;

class MatchApi
{
    // private const URL = "https://{platform}.api.riotgames.com/lol/league/v4/entries/by-summoner/{encryptedSummonerId}";
    private const URL = "https://{region}.api.riotgames.com/lol/match/v5/matches/by-puuid/{puuid}/ids?start={start}&count={count}";
    
    private const START = 0;

    private const REGION = [
        "EUW1"  => "EUROPE",
        "EUN1"  => "EUROPE",
        "BR1"   => "AMERICAS",
        "LA1"   => "AMERICAS",
        "LA2"   => "AMERICAS",
        "NA1"   => "AMERICAS",
        "JP1"   => "ASIA",
        "KR"    => "ASIA",
        "RU"    => "ASIA"
    ];
  

    /**
     * @var BaseApi
     */
    private $baseApi;

    /**
     * LeagueApi constructor.
     *
     * @param BaseApi $baseApi
     */
    public function __construct(BaseApi $baseApi)
    {
        $this->baseApi = $baseApi;
    }

    /**
     * @param string $puuid
     * @param string $platform
     * @return array<mixed>|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getMatchs(string $puuid, string $platform, int $count = 20): ?array
    {
        // if (!$this->baseApi->checkPlatform($platform)) {
        //     return null;
        // }
        
        $url = $this->baseApi->constructUrl(
            self::URL,
            [
                'region' => self::REGION[$platform],
                'puuid' => $puuid,
                'start' => self::START,
                'count' => $count,
            ]
        );
        return $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
    }

    public function getMatchDetail(string $id)
    {

    }
}
