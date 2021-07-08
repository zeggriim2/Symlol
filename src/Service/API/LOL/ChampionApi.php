<?php


namespace App\Service\API\LOL;


class ChampionApi extends BaseApi
{
    const URL_CHAMPIONS = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion.json";

    public function GetAllChampion()
    {
        $data = [
            "version" => $this->apiClient->getVersion(),
            "lang" => $this->apiClient->getLang()
        ];
        $url = $this->constructUrl(self::URL_CHAMPIONS, $data);
        return $this->callApi($url)['data'];
    }

    public function GetAllNameChampion()
    {
        $nameChampion = array_keys($this->GetAllChampion());
        dd($nameChampion);
    }

    public function getChampion(string $name)
    {
        $name = ucfirst($name);
        $champion = $this->GetAllChampion()[ucfirst($name)];
        dd($champion);
    }

    private function constructUrl(string $url, array $params)
    {
        foreach($params as $key => $param){
            $url = str_replace("{{$key}}", $param, $url);
        }
        return $url;
    }
}