<?php


namespace App\Service\API\LOL;


use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SummonerApi extends BaseApi
{

    const URL = "https://{platform}.api.riotgames.com/lol/summoner/v4/summoners/by-name/{name}";


    public function getSummoner(string $platform,string $name)
    {
        $url = $this->constructUrl(self::URL, ['platform' => $platform, 'name' => $name]);
        return $this->callApi($url, "GET",  [
            'headers' => [
                'X-Riot-Token' => $this->apiKey,
            ]
        ]);
    }

    private function constructUrl(string $url, array $params)
    {
        foreach($params as $key => $param){
            $url = str_replace("{{$key}}", $param, $url);
        }
        return $url;
    }
}