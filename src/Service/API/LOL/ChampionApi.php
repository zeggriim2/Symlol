<?php


namespace App\Service\API\LOL;



use App\Entity\Champion;
use App\Entity\Version;

class ChampionApi extends BaseApi
{
    const URL_CHAMPIONS = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion.json";
    const URL_CHAMPION = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/champion/{name}.json";

    /**
     * Retourne la liste complète des champions
     * @return array
     */
    public function GetAllChampion(): array
    {
        $data = [
            "version"   => $this->getLastVersion(),
            "lang"      => $this->lang
        ];
        $url = $this->constructUrl(self::URL_CHAMPIONS, $data);
        return $this->callApi($url);
    }

    public function GetChampion(string $name): array
    {
        $data = [
            "version"   => $this->getLastVersion(),
            "lang"      => $this->lang,
            "name"      => $name
        ];

        $url = $this->constructUrl(self::URL_CHAMPION, $data);
        return $this->callApi($url);
    }

    public function GetChampionDoctrine(string $name)
    {
        $data = [
            "version"   => $this->getLastVersion(),
            "lang"      => $this->lang,
            "name"      => $name
        ];

        $url = $this->constructUrl(self::URL_CHAMPION, $data);
        $data = $this->callApi($url);
        $versionApi = $data['version'];
        $championApi = $data['data'];
//        dd($championApi[$name]['lore']);
        // Check version Existe
        $versionRepo = $this->registry->getRepository(Version::class)->findBy(['version' => $versionApi]);
        if (!$versionRepo)
        {
            // Créer la version
            $version = new Version();
            $version->setVersion((string)$versionApi);
            $this->registry->getManager()->persist($version);

            $champion = new Champion();
            $champion->setVersion($version);
            $champion->setName($championApi[$name]['name']);
            $champion->setIdLol($championApi[$name]['key']);
            $champion->setTitle($championApi[$name]['title']);
            $champion->setLore($championApi[$name]['lore']);
            $champion->setBlurb($championApi[$name]['blurb']);
            $champion->setImgLoading($championApi[$name]['id'].'_0.jpg');
            $champion->setCreatedAt(new \DateTimeImmutable());
            $this->registry->getManager()->persist($champion);

            $this->registry->getManager()->flush();

            return $champion;
        }

        // récupere le champion
//        $championRepo = $this->registry->getRepository(Champion::class)->existeChampion($versionApi, $championApi[$name]["key"]);
        $championRepo = $this->registry->getRepository(Champion::class)->existeChampion($versionApi, $championApi[$name]["key"]);
        if (!$championRepo)
        {
            $champion = new Champion();
            $champion->setVersion($versionRepo);
            $champion->setName($championApi[$name])['name'];
            $champion->setIdLol($championApi[$name]['key']);
            $champion->setTitle($championApi[$name]['title']);
            $champion->setLore($championApi[$name]['lore']);
            $champion->setBlurb($championApi[$name]['blurb']);
            $champion->setImgLoading($championApi[$name]['id'].'_0.jpg');
            $champion->setCreatedAt(new \DateTimeImmutable());
            $this->registry->getManager()->persist($champion);

            $this->registry->getManager()->flush();

            return $champion;
        }
        return $championRepo;

//        return $this->callApi($url);
    }


    private function constructUrl(string $url, array $params)
    {
        foreach($params as $key => $param){
            $url = str_replace("{{$key}}", $param, $url);
        }
        return $url;
    }
}