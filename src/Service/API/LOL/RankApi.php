<?php

namespace App\Service\API\LOL;

class RankApi
{
    private const URL = "https://{platform}.api.riotgames.com/lol/league/v4/{leagues}/by-queue/{queue}";
    /**
     * @var BaseApi
     */
    private $baseApi;

    /**
     * RankApi constructor.
     * @param BaseApi $baseApi
     */
    public function __construct(BaseApi $baseApi)
    {
        $this->baseApi = $baseApi;
    }


    /**
     * @param string $platform
     * @param string $queue
     * @param string $leagues
     * @return array<mixed>|null
     */
    public function getLadder(string $platform, string $queue, string $leagues): ?array
    {
        if (!$this->baseApi->checkPlatform($platform)) {
            return null;
        }

        $url = $this->baseApi->constructUrl(self::URL, [
            'platform'  => strtolower($platform),
            'queue'     => $queue,
            'leagues'   => $leagues . 'leagues'
         ]);

        return $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);
    }
}
