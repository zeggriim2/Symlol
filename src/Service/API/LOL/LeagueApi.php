<?php


namespace App\Service\API\LOL;


class LeagueApi extends BaseApi
{
    const URL = "https://{platform}.api.riotgames.com/lol/league/v4/entries/by-summoner/{encryptedSummonerId}";

    public function getInforSummoner(string $platform, string $encryptedSummonerId)
    {
        if (!$this->checkPlatform($platform)){
            return null;
        }
        $url = $this->constructUrl(self::URL, ['platform' => $platform, 'encryptedSummonerId' => $encryptedSummonerId]);
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