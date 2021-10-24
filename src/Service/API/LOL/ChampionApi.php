<?php

namespace App\Service\API\LOL;

class ChampionApi
{
    private const URL_CHAMPIONS = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion.json";
    private const URL_CHAMPION = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion/{name}.json";
    /**
     * @var BaseApi
     */
    private $baseApi;

    /**
     * ChampionApi constructor.
     * @param BaseApi $baseApi
     */
    public function __construct(BaseApi $baseApi)
    {
        $this->baseApi = $baseApi;
    }

    /**
     * Retourne la liste complète des champions
     * @return array<mixed>|null
     */
    public function getAllChampion(): ?array
    {
        $data = [
            // "version"   => $this->baseApi->getLastVersion(),
            "version"   => $this->baseApi->getVersionSession(),
            "lang"      => $this->baseApi->lang
        ];

        $url = $this->baseApi->constructUrl(self::URL_CHAMPIONS, $data);
        return $this->baseApi->callApiCache($url);
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
            "version"   => $this->baseApi->getVersionSession(),
            "lang"      => $this->baseApi->lang,
            "name"      => $name
        ];

        $url = $this->baseApi->constructUrl(self::URL_CHAMPION, $data);
        return $this->baseApi->callApiCache($url);
    }

    /**
     * Récupère tout les noms de champions
     *
     * @return array
     */
    public function getAllNameChampion(): array
    {
        $champions = $this->GetAllChampion();
        $nameChampions = [];
        foreach (array_keys($champions['data']) as $name) {
            $nameChampions[] = $name;
        }
        return $nameChampions;
    }
}
