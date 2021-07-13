<?php


namespace App\Service\API\LOL;

use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class BaseApi
 * @package App\Service\API\LOL
 */
class BaseApi
{
    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var ManagerRegistry
     */
    protected $registry;

    public function __construct(HttpClientInterface $httpClient, ManagerRegistry $registry)
    {
        $this->httpClient = $httpClient;
        $this->lang = "fr_FR";

        $this->registry = $registry;
    }

    protected function getLastVersion(): string
    {
        $url = "https://ddragon.leagueoflegends.com/api/versions.json";
        return  $this->callApi($url)[0];
    }

    protected function callApi($url, $method = "GET", $options = []): array
    {
        $response = $this->httpClient->request($method, $url, $options);
        if ($response->getStatusCode() === 200){
            return $response->toArray();
        }
    }

//    protected function callApi(string $url,string $method = 'GET')
//    {
//        $response = $this->httpClient->request($method,$url);
//        if ($response->getStatusCode() === 200){
//            return $response->toArray();
//        }
//    }
}