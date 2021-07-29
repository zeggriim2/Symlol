<?php

namespace App\Service\API\LOL;

class LeagueApi 
{
    private const URL = "https://{platform}.api.riotgames.com/lol/league/v4/entries/by-summoner/{encryptedSummonerId}";
    private const URL_LEAGUE_ID = "https://{platform}.api.riotgames.com/lol/league/v4/leagues/{leagueId}";

    /**
     * @var BaseApi
     */
    private $baseApi;

    /**
     * LeagueApi constructor.
     */
    public function __construct(BaseApi $baseApi)
    {
        $this->baseApi = $baseApi;
    }

    /**
     * @param string $platform
     * @param string $encryptedSummonerId
     * @return array<mixed>|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getInfoSummoner(string $platform, string $encryptedSummonerId): ?array
    {
        if (!$this->baseApi->checkPlatform($platform)) {
            return null;
        }
        $url = $this->constructUrl(self::URL, ['platform' => $platform, 'encryptedSummonerId' => $encryptedSummonerId]);
        return $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
    }

    public function getLeagueId(string $platform, string $leagueId): ?array
    {
        if (!$this->baseApi->checkPlatform($platform)) {
            return null;
        }

        $url = $this->constructUrl(self::URL_LEAGUE_ID, ['platform' => $platform, 'leagueId' => $leagueId]);
        return $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
    }

    /**
     * @param string $url
     * @param array<string> $params
     * @return string
     */
    protected function constructUrl(string $url, array $params): string
    {
        foreach ($params as $key => $param) {
            $url = str_replace("{{$key}}", $param, $url);
        }
        return $url;
    }
}
