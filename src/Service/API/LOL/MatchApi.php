<?php

namespace App\Service\API\LOL;

use App\Service\API\models\MatchEntity;
use App\Service\API\models\MatchTimeLine;
use App\Service\API\models\Summoner;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class MatchApi
{
    private const URL_LIST_MATCH_BY_PUUID = "https://{region}.api.riotgames.com/lol/match/v5/matches/by-puuid/{puuid}/ids?start={start}&count={count}";
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
     * @var DenormalizerInterface
     */
    private DenormalizerInterface $denormalizer;

    /**
     * LeagueApi constructor.
     *
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
     * Obtenir une liste d'identifiants de match par puuid
     * Par défaut il en retourne 20
     *
     * @param string $summonerPuuid
     * @param string $platform
     * @param int $start
     * @param int $count
     * @return array|null
     */
    public function getListIdMatchBySummonerPuuid(
        string $summonerPuuid,
        string $platform,
        int $start = 0,
        int $count = 20
    ): ?array {
        $url = $this->baseApi->constructUrl(
            self::URL_LIST_MATCH_BY_PUUID,
            [
                "region" => self::REGION[strtoupper($platform)],
                'puuid'     => $summonerPuuid,
                'start'     => $start,
                'count'     => $count,
            ]
        );

        return  $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
    }

    public function getMatchByMatchId(
        string $matchId,
        string $platform
    ): MatchEntity {
        $url = $this->baseApi->constructUrl(
            self::URL_MATCH_ID,
            [
                "region"    => self::REGION[strtoupper($platform)],
                'matchId'   => $matchId
            ]
        );

        $match =  $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
        return $this->denormalizer->denormalize($match, MatchEntity::class);
    }


    public function getMatchTimeline(
        string $matchId,
        string $platform
    ): MatchTimeLine {
        $url = $this->baseApi->constructUrl(
            self::URL_MATCH_TIMELINE,
            [
                'region'    => self::REGION[strtoupper($platform)],
                'matchId'   => $matchId
            ]
        );

        $match = $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);

        return $this->denormalizer->denormalize($match, MatchTimeLine::class);
    }


    /**
     * @param string $puuid
     * @param string $platform
     * @param int $start
     * @param int $count
     * @return array<mixed>|null
     */
    public function getMatchs(
        string $puuid,
        string $platform,
        int $start = 0,
        int $count = 20
    ): ?array {
        $url = $this->baseApi->constructUrl(
            self::URL_LIST_MATCH_BY_PUUID,
            [
                'region'    => self::REGION[$platform],
                'puuid'     => $puuid,
                'start'     => $start,
                'count'     => $count,
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

    public function getMatchDetail(
        string $matchId,
        string $platform
    ) {
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
}
