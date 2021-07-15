<?php


namespace App\Service\API\LOL;



class ChampionApi extends BaseApi
{
    const URL_CHAMPIONS = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion.json";
    const URL_CHAMPION = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion/{name}.json";

    /**
     * Retourne la liste complète des champions
     * @return array
     */
    public function getAllChampion(): array
    {
        $data = [
            "version"   => $this->getLastVersion(),
            "lang"      => $this->lang
        ];
        $url = $this->constructUrl(self::URL_CHAMPIONS, $data);
        return $this->callApi($url);
    }

    public function getChampion(string $name): array
    {
        $data = [
            "version"   => $this->getLastVersion(),
            "lang"      => $this->lang,
            "name"      => $name
        ];

        $url = $this->constructUrl(self::URL_CHAMPION, $data);
        return $this->callApi($url);
    }

    public function getAllNameChampion(): array
    {
        $champions = $this->GetAllChampion();
        foreach (array_keys($champions['data']) as $name)
        {
            $nameChampions[] = $name;
        }
        return $nameChampions;
    }


    private function constructUrl(string $url, array $params)
    {
        foreach($params as $key => $param){
            $url = str_replace("{{$key}}", $param, $url);
        }
        return $url;
    }
}