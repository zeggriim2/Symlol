<?php


namespace App\Service\API\LOL;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Throwable;

/**
 * Class BaseApi
 * @package App\Service\API\LOL
 */
class BaseApi
{
    const PLATFORM = ['BR1', 'EUN1', 'EUW1', 'JP1', 'KR', 'LA1', 'LA2', 'NA1', 'OC1', 'TR', 'RU'];

    const CODE_HTTP_INFO    = [100, 101, 102, 103];
    const CODE_HTTP_SUCCESS = [200,201,202];
    const CODE_HTTP_ERREUR  = [400, 401,402,403,404];

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
    protected $apilogger;
    /**
     * @var LoggerInterface
     */
    private $apiLogger;


    public function __construct(HttpClientInterface $httpClient,LoggerInterface $apiLogger)
    {
        $this->httpClient   = $httpClient;
        $this->apiLogger    = $apiLogger;
        $this->lang         = "fr_FR";
        $this->apiKey       = $_ENV['APIKEY'] ? $_ENV['APIKEY'] : null;
    }

    protected function getLastVersion(): string
    {
        $url = "https://ddragon.leagueoflegends.com/api/versions.json";
        return  $this->callApi($url)[0];
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $options
     * @return array|null
     * @throws ClientExceptionInterface
     * @throws TransportExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     */
    protected function callApi($url, $method = "GET", $options = []): ?array
    {
        $response = $this->httpClient->request($method, $url, $options);
        $codeHttp = $response->getStatusCode();
        if (in_array($codeHttp, self::CODE_HTTP_SUCCESS)) {
            $this->apiLogger->info("API SUCCESS", [
                'code' => $codeHttp,
                'url' => $url,
                'options'   => $options
            ]);
            return $response->toArray();
        } elseif (in_array($codeHttp, self::CODE_HTTP_INFO)) {
            $this->apiLogger->info("API INFO", [
                'code' => $codeHttp,
                'url' => $url,
                'options'   => $options
            ]);
            return null;
        } elseif (in_array($codeHttp, self::CODE_HTTP_ERREUR)) {
            $this->apiLogger->error("API ERREUR", [
                'code' => $codeHttp,
                'url' => $url,
                'options'   => $options
            ]);
            return null;
        }
        return null;
    }

    protected function checkPlatform(string $platform)
    {
        return in_array($platform, self::PLATFORM);
    }

//    protected function callApi(string $url,string $method = 'GET')
//    {
//        $response = $this->httpClient->request($method,$url);
//        if ($response->getStatusCode() === 200){
//            return $response->toArray();
//        }
//    }
}