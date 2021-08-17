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
     */
    public function __construct(BaseApi $baseApi)
    {
        $this->baseApi = $baseApi;
    }


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
    public function getLadder(string $platform, string $queue, string $leagues): ?array
    {
        if (!$this->baseApi->checkPlatform($platform)) {
            return null;
        }

        $url = $this->constructUrl(self::URL, [
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
