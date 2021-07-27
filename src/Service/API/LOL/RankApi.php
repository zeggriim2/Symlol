<?php

namespace App\Service\API\LOL;

class RankApi extends BaseApi
{
    private const URL = "https://{platform}.api.riotgames.com/lol/league/v4/challengerleagues/by-queue/{queue}";

    /**
     * @param string $platform
     * @param string $queue
     * @return array<mixed>|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getChallenger(string $platform, string $queue): ?array
    {
        if (!$this->checkPlatform($platform)) {
            return null;
        }
        $url = $this->constructUrl(self::URL, ['platform' => $platform, 'queue' => $queue]);
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
