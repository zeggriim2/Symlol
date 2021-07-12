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
     * BaseApi constructor.
     * @param ApiClient $apiClient
     * @param HttpClientInterface $client
     */
    public function __construct(ApiClient $apiClient, HttpClientInterface $client)
    {
        $this->apiClient = $apiClient;
//        $this->httpClient = HttpClient::create();
        $this->httpClient = $client;
    }

    protected function callApi(string $url,string $method = 'GET')
    {
        $response = $this->httpClient->request($method,$url);
        if ($response->getStatusCode() === 200){
            return $response->toArray();
        }
    }
}