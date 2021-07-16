<?php


namespace App\Service\API\LOL;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class BaseApi
 * @package App\Service\API\LOL
 */
class BaseApi
{
    const CODE_HTTP_INFO    = [100, 101, 102, 103];
    const CODE_HTTP_SUCCESS  = [200,201,202];

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
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(HttpClientInterface $httpClient, LoggerInterface $logger)
    {
        $this->httpClient   = $httpClient;
        $this->logger       = $logger;
        $this->lang         = "fr_FR";
        $this->apiKey       = $_ENV['APIKEY'];
    }

    protected function getLastVersion(): string
    {
        $url = "https://ddragon.leagueoflegends.com/api/versions.json";
        return  $this->callApi($url)[0];
    }

    protected function callApi($url, $method = "GET", $options = []): array
    {
        try{
            $response = $this->httpClient->request($method, $url, $options);
            $codeHttp = $response->getStatusCode();
            if (in_array($codeHttp,self::CODE_HTTP_SUCCESS)){
                $this->logger->info("API SUCCESS", [
                    'code' => $codeHttp,
                    'url' => $url
                ]);
                return $response->toArray();
            }elseif (in_array($codeHttp,self::CODE_HTTP_INFO)){
                $this->logger->info("API INFO", [
                    'code' => $codeHttp,
                    'url' => $url
                ]);
            }
        }catch (TransportExceptionInterface $e) {
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