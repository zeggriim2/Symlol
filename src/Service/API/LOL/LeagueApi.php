<?php

namespace App\Service\API\LOL;

class LeagueApi extends BaseApi
{
    private const URL = "https://{platform}.api.riotgames.com/lol/league/v4/entries/by-summoner/{encryptedSummonerId}";
    private const URL_LEAGUE_ID = "https://{platform}.api.riotgames.com/lol/league/v4/leagues/{leagueId}";
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
        if (!$this->checkPlatform($platform)) {
            return null;
        }
        $url = $this->constructUrl(self::URL, ['platform' => $platform, 'encryptedSummonerId' => $encryptedSummonerId]);
        return $this->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->apiKey,
            ]
        ]);
    }

    public function getLeagueId(string $platform, string $leagueId): ?array
    {
        if (!$this->checkPlatform($platform)) {
            return null;
        }

        $url = $this->constructUrl(self::URL_LEAGUE_ID, ['platform' => $platform, 'leagueId' => $leagueId]);
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
    private function constructUrl(string $url, array $params): string
    {
        foreach ($params as $key => $param) {
            $url = str_replace("{{$key}}", $param, $url);
        }
        return $url;
    }
}
