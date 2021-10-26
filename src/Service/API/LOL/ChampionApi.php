<?php

namespace App\Service\API\LOL;

use App\Service\API\models\ChampionRotation;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ChampionApi
{
    private const URL_CHAMPIONS = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion.json";
    private const URL_CHAMPION = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion/{name}.json";
    private const URL_CHAMPION_ROTATION = "https://{platform}.api.riotgames.com/lol/platform/v3/champion-rotations";
    /**
     * @var BaseApi
     */
    private $baseApi;
    /**
     * @var DenormalizerInterface
     */
    private DenormalizerInterface $denormalizer;

    /**
     * ChampionApi constructor.
     * @param BaseApi $baseApi
     */
    public function __construct(
        BaseApi $baseApi,
        DenormalizerInterface $denormalizer
    )
    {
        $this->baseApi = $baseApi;
        $this->denormalizer = $denormalizer;
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

    public function getChampionRotation(
        string $platform
    ): ChampionRotation
    {
        $url = $this->baseApi->constructUrl(
            self::URL_CHAMPION_ROTATION,
            [
                "platform" => $platform
            ]
        );

        $championRotation = $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);

        return $this->denormalizer->denormalize($championRotation, ChampionRotation::class);
    }
}
