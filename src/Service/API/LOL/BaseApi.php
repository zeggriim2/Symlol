<?php


namespace App\Service\API\LOL;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class BaseApi
 * @package App\Service\API\LOL
 */
class BaseApi
{
    /**
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $lang;
    /**
     * @var mixed
     */
    protected $apiKey;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->lang = "fr_FR";
        $this->apiKey = $_ENV['APIKEY'];
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