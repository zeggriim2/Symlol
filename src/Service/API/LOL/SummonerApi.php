<?php

namespace App\Service\API\LOL;

use App\Service\API\models\Summoner;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class SummonerApi
{
    private const URL_NAME =
        "https://{platform}.api.riotgames.com/lol/summoner/v4/summoners/by-name/{name}";
    private const URL_ACCOUNT =
        "https://{platform}.api.riotgames.com/lol/summoner/v4/summoners/by-account/{encryptedAccountId}";
    private const URL_PUUID =
        "https://{platform}.api.riotgames.com/lol/summoner/v4/summoners/by-puuid/{encryptedPUUID}";
    private const URL_SUMMONER_ID =
        "https://{platform}.api.riotgames.com/lol/summoner/v4/summoners/{encryptedSummonerId}";


    public const PLATFORM = [
        'EUW1' => "EUW1", //Europe West
        'BR1' => "BR1", // Brazil
        'EUN1' => "EUN1", // Europe Nordic et East
        'JP1' => "JP1", // Japon
        'KR' => "KR", // Korea
        'LA1' => "LA1",
        'LA2' => "LA2",
        'NA1' => "NA1",
        'OC1' => "OC1",
        'RU' => "RU", // Russie
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
     * SummonerApi constructor.
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
     * @param string $platform
     * @param string $name
     * @return array|null
     */
    public function getSummonerBySummonerName(
        string $platform,
        string $name
    ): ?array {

        $url = $this->baseApi->constructUrl(
            self::URL_NAME,
            [
                'platform' => $platform,
                'name' => $name
            ]
        );

        $summoner =  $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
        return $summoner;
        // return $summoner ? $this->denormalize($summoner) : $summoner;
//        return $this->denormalize($summoner);
    }

    /**
     * Get Summoner by account ID
     *
     * @param string $platform
     * @param string $accountId
     * @return array|null
     */
    public function getSummonerByAccountID(string $platform, string $accountId): ?array
    {
        $url = $this->baseApi->constructUrl(
            self::URL_ACCOUNT,
            [
                'platform' => $platform,
                'encryptedAccountId' => $accountId
            ]
        );

        $summoner =  $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);

        return $summoner;
        // return $this->denormalize($summoner);
    }

    /**
     * Get Summoner by PUUID
     * @param string $platform
     * @param string $puuid
     * @return array|null
     */
    public function getSummonerByPuuid(string $platform, string $puuid): ?array
    {
        $url = $this->baseApi->constructUrl(
            self::URL_PUUID,
            [
                'platform' => $platform,
                'encryptedPUUID' => $puuid
            ]
        );

        $summoner =  $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);

        return $summoner;
        // return $this->denormalize($summoner);
    }

    /**
     * Get Summoner by Summoner ID
     * @param string $platform
     * @param string $summonerId
     * @return array|null
     */
    public function getSummonerBySummonerId(string $platform, string $summonerId): ?array
    {
        $url = $this->baseApi->constructUrl(
            self::URL_SUMMONER_ID,
            [
                'platform' => $platform,
                'encryptedSummonerId' => $summonerId
            ]
        );

        $summoner =  $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);

        return $summoner;
        // return $this->denormalize($summoner);
    }

    private function denormalize(array $data): Summoner
    {
        return $this->denormalizer->denormalize($data, Summoner::class);
    }
}
