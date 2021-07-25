<?php


namespace App\Service\API\LOL;


use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SummonerApi extends BaseApi
{

    const URL = "https://{platform}.api.riotgames.com/lol/summoner/v4/summoners/by-name/{name}";
    const PLATFORM = [
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
     * @param string $platform
     * @param string $name
     * @return array<string
|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getSummoner(string $platform, string $name)
    {
        $url = $this->constructUrl(self::URL, ['platform' => $platform, 'name' => $name]);
        return $this->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->apiKey,
            ]
        ]);
    }

    /**
     * @param string $url
     * @param array<string> $params
     * @return string
     */
    private function constructUrl(string $url, array $params)
    {
        foreach ($params as $key => $param) {
            $url = str_replace("{{$key}}", $param, $url);
        }
        return $url;
    }
}