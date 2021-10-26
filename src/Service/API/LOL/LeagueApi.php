<?php

namespace App\Service\API\LOL;

use App\Service\API\models\LeagueEntry;
use App\Service\API\models\LeagueList;
use App\Service\API\models\Queue;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class LeagueApi
{
    private const URL_CHALLENGER_LEAGUE_QUEUE = "https://{platform}.api.riotgames.com/lol/league/v4/challengerleagues/by-queue/{queue}";
    private const URL_MASTER_LEAGUE_QUEUE = "https://{platform}.api.riotgames.com/lol/league/v4/masterleagues/by-queue/{queue}";
    private const URL_GRANDMASTER_LEAGUE_QUEUE ="https://{platform}.api.riotgames.com/lol/league/v4/grandmasterleagues/by-queue/{queue}";
    private const URL_LEAGUE_SUMMONER_ID = "https://{platform}.api.riotgames.com/lol/league/v4/entries/by-summoner/{encryptedSummonerId}";
    private const URL_LEAGUE_ID = "https://{platform}.api.riotgames.com/lol/league/v4/leagues/{leagueId}";
    private const URL_LEAGUE = "https://{platform}.api.riotgames.com/lol/league/v4/entries/{queue}/{tier}/{division}";

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
    )
    {
        $this->baseApi = $baseApi;
        $this->denormalizer = $denormalizer;
    }

    public function getLeagueChallenger(
        string $platform,
        string $queue
    ): LeagueList
    {
        $url = $this->baseApi->constructUrl(
            self::URL_CHALLENGER_LEAGUE_QUEUE,
            [
                "platform"  => $platform,
                "queue"     => $queue
            ]
        );

        $leagueChallenger = $this->baseApi->callApi($url,"GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
//        dd($leagueGrandMaster);

        return $this->denormalizer->denormalize($leagueChallenger, LeagueList::class);
    }

    public function getLeagueGrandMaster(
        string $platform,
        string $queue
    ): LeagueList
    {
        $url = $this->baseApi->constructUrl(
            self::URL_GRANDMASTER_LEAGUE_QUEUE,
            [
                "platform"  => $platform,
                "queue"     => $queue
            ]
        );

        $leagueGrandMaster = $this->baseApi->callApi($url,"GET", [
                'headers' => [
                    'X-Riot-Token' => $this->baseApi->apiKey,
                ]
            ]);
//        dd($leagueGrandMaster);

        return $this->denormalizer->denormalize($leagueGrandMaster, LeagueList::class);
    }

    public function getLeagueMaster(
        string $platform,
        string $queue
    ): LeagueList
    {
        $url = $this->baseApi->constructUrl(
            self::URL_MASTER_LEAGUE_QUEUE,
            [
                "platform"  => $platform,
                "queue"     => $queue
            ]
        );

        $leagueMaster = $this->baseApi->callApi($url,"GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);

        return $this->denormalizer->denormalize($leagueMaster, LeagueList::class);
    }

    /**
     * @param string $summunerId
     * @param string $platform
     * @return LeagueEntry[]
     */
    public function getLeagueBySummonerId(
        string $summunerId,
        string $platform
    ): array
    {
        $url = $this->baseApi->constructUrl(
            self::URL_LEAGUE_SUMMONER_ID,
            [
                "platform"              => $platform,
                "encryptedSummonerId"   => $summunerId
            ]
        );

        $leagues = $this->baseApi->callApi($url,"GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);

        $leagueObj = [];
        foreach ($leagues as $league){
            $leagueObj[] = $this->denormalizer->denormalize($league,LeagueEntry::class);
        }

        return $leagueObj;
    }


    public function getAllLeague(
        string $platform,
        string $queue,
        string $tier,
        string $division
    )
    {
        $url = $this->baseApi->constructUrl(
            self::URL_LEAGUE,
            [
                "platform"  => $platform,
                "queue"     => $queue,
                "tier"      => $tier,
                "division"  => $division,
            ]
        );

        $leagues = $this->baseApi->callApi($url,"GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
        $leagueObj = [];
        foreach ($leagues as $league){
            $leagueObj[] = $this->denormalizer->denormalize($league,LeagueEntry::class);
        }

        return $leagueObj;
    }



    public function getLeagueByLeagueId(
        string $platform,
        string $leagueId
    ): LeagueList
    {
        $url = $this->baseApi->constructUrl(
            self::URL_LEAGUE_ID,
            [
                "platform" => $platform,
                "leagueId" => $leagueId
            ]
        );

        $league = $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);

        return $this->denormalizer->denormalize($league, LeagueList::class);
    }


    /**
     * @param string $platform
     * @param string $encryptedSummonerId
     * @return array<mixed>|null
     */
    public function getInfoSummoner(
        string $platform,
        string $encryptedSummonerId
    ): ?array
    {
        if (!$this->baseApi->checkPlatform($platform)) {
            return null;
        }
        $url = $this->baseApi->constructUrl(
            self::URL,
            [
              'platform' => $platform,
                'encryptedSummonerId' => $encryptedSummonerId
            ]
        );
        return $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
    }

    /**
     * Récupère l'ID de la League
     *
     * @param string $platform
     * @param string $leagueId
     * @return array|null
     */
    public function getLeagueId(
        string $platform,
        string $leagueId
    ): ?array
    {
        if (!$this->baseApi->checkPlatform($platform)) {
            return null;
        }

        $url = $this->baseApi->constructUrl(self::URL_LEAGUE_ID, ['platform' => $platform, 'leagueId' => $leagueId]);
        return $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
    }
}
