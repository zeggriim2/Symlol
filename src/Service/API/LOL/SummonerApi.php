<?php

namespace App\Service\API\LOL;

class SummonerApi
{

    private const URL = "https://{platform}.api.riotgames.com/lol/summoner/v4/summoners/by-name/{name}";
    public const PLATFORM = [
        'EUW1'  => "EUW1", //Europe West
        'BR1'   => "BR1", // Brazil
        'EUN1'  => "EUN1", // Europe Nordic et East
        'JP1'   => "JP1", // Japon
        'KR'    => "KR", // Korea
        'LA1'   => "LA1",
        'LA2'   => "LA2",
        'NA1'   => "NA1",
        'OC1'   => "OC1",
        'RU'    => "RU", // Russie
    ];
    /**
     * @var BaseApi
     */
    private $baseApi;

    /**
     * SummonerApi constructor.
     * @param BaseApi $baseApi
     */
    public function __construct(BaseApi $baseApi)
    {
        $this->baseApi = $baseApi;
    }


    /**
     * @param string $platform
     * @param string $name
     * @return array<mixed>|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getSummoner(string $platform, string $name)
    {

        $url = $this->baseApi->constructUrl(self::URL, ['platform' => $platform, 'name' => $name]);
        return $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
    }
}
