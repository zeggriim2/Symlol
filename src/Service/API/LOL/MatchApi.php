<?php

namespace App\Service\API\LOL;

class MatchApi
{
    private const URL = "https://{region}.api.riotgames.com/lol/match/v5/matches/by-puuid/{puuid}/ids?start={start}&count={count}";
    private const URL_MATCH_ID = "https://{region}.api.riotgames.com/lol/match/v5/matches/{matchId}";
    private const URL_MATCH_TIMELINE = "https://{region}.api.riotgames.com/lol/match/v5/matches/{matchId}/timeline";

    private const START = 0;

    private const REGION = [
        "EUW1"  => "EUROPE",
        "EUN1"  => "EUROPE",
        "RU"    => "EUROPE",
        "TR1"   => "EUROPE",
        "BR1"   => "AMERICAS",
        "LA1"   => "AMERICAS",
        "LA2"   => "AMERICAS",
        "NA1"   => "AMERICAS",
        "OC1"   => "AMERICAS",
        "JP1"   => "ASIA",
        "KR"    => "ASIA"
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
        $url = $this->baseApi->constructUrl(
            self::URL,
            [
                'region' => self::REGION[$platform],
                'puuid' => $puuid,
                'start' => self::START,
                'count' => $count,
            ]
        );
        $matchsId = $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);

        if (!is_null($matchsId)) {
            foreach ($matchsId as $matchId) {
                $detailMatch[$matchId] = $this->getMatchDetail($matchId, $platform);
            }
        }

        return $detailMatch;
    }

    public function getMatchDetail(string $matchId, string $platform)
    {
        $url = $this->baseApi->constructUrl(
            self::URL_MATCH_ID,
            [
                'region'    => self::REGION[$platform],
                'matchId'   => $matchId
            ]
        );
        return $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
    }

    public function getMatchTimeline(string $matchId, string $platform)
    {
        $url = $this->baseApi->constructUrl(
            self::URL_MATCH_TIMELINE,
            [
                'region'    => self::REGION[$platform],
                'matchId'   => $matchId
            ]
        );

        return $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
    }
}
