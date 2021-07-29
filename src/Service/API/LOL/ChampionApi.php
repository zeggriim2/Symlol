<?php

namespace App\Service\API\LOL;

class ChampionApi extends BaseApi
{
    private const URL_CHAMPIONS = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion.json";
    private const URL_CHAMPION = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion/{name}.json";

    /**
     * Retourne la liste complète des champions
     * @return array<mixed>|null
     */
    public function getAllChampion(): ?array
    {
        $data = [
            "version"   => $this->getLastVersion(),
            "lang"      => $this->lang
        ];
        $url = $this->constructUrl(self::URL_CHAMPIONS, $data);
        return $this->callApi($url);
    }

    /**
     * @param string $name
     * @return array<mixed>|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getChampion(string $name): ?array
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
        $nameChampions = [];
        foreach (array_keys($champions['data']) as $name) {
            $nameChampions[] = $name;
        }
        return $nameChampions;
    }


    /**
     * @param string $url
     * @param array<string> $params
     * @return string
     */
    protected function constructUrl(string $url, array $params)
    {
        foreach ($params as $key => $param) {
            $url = str_replace("{{$key}}", $param, $url);
        }
        return $url;
    }
}
