<?php

namespace App\Service\API\LOL;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class BaseApi
 * @package App\Service\API\LOL
 */
class BaseApi
{
    private const PLATFORM = ['BR1', 'EUN1', 'EUW1', 'JP1', 'KR', 'LA1', 'LA2', 'NA1', 'OC1', 'TR', 'RU'];

    private const URL_VERSION = "https://ddragon.leagueoflegends.com/api/versions.json";

    private const CODE_HTTP_INFO    = [100, 101, 102, 103];
    private const CODE_HTTP_SUCCESS = [200,201,202];
    private const CODE_HTTP_ERREUR  = [400, 401,402,403,404];

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var string
     */
    public $lang;

    /**
     * @var mixed
     */
    public $apiKey;

    /**
     * @var LoggerInterface
     */
    private $apiLogger;

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * @var RequestStack
     */
    public $requestStack;


    /**
     * BaseApi constructor.
     * @param HttpClientInterface $httpClient
     * @param LoggerInterface $apiLogger
     * @param string $apiKey
     * @param CacheInterface $cache
     * @param RequestStack $requestStack
     */
    public function __construct(
        HttpClientInterface $httpClient,
        LoggerInterface $apiLogger,
        string $apiKey,
        CacheInterface $cache,
        RequestStack $requestStack
    ) {
        $this->httpClient   = $httpClient;
        $this->apiLogger    = $apiLogger;
        $this->apiKey       = $apiKey;
        $this->lang         = "fr_FR";
        $this->cache        = $cache;
        $this->requestStack = $requestStack;
    }

    public function getLastVersion(): string
    {
        return $this->getAllVersion()[0];
    }

    public function getAllVersion(): array
    {
        return $this->callApi(self::URL_VERSION);
    }

    /**
     * @param string $url
     * @param string $method
     * @param array<mixed> $options
     * @return array|null
     * @throws ClientExceptionInterface
     * @throws TransportExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function callApiCache(string $url, string $method = "GET", array $options = []): ?array
    {
        $hash = hash("sha256", $url);
        return $this->cache->get($hash, function () use ($method, $options, $url) {
            return $this->request($url, $method, $options);
        });
    }

    /**
     * Appel API sans utilisé le cache
     *
     * @param string $url
     * @param string $method
     * @param array $options
     * @return array|null
     */
    public function callApi(string $url, string $method = "GET", array $options = []): ?array
    {
        return $this->request($url, $method, $options);
    }

    /**
     * Vérifi la plaftform
     *
     * @param string $platform
     * @return bool
     */
    public function checkPlatform(string $platform): bool
    {
        return in_array(strtoupper($platform), self::PLATFORM);
    }

    /**
     * @param string $url
     * @param array<string> $params
     * @return string
     */
    public function constructUrl(string $url, array $params)
    {
        foreach ($params as $key => $param) {
            $url = str_replace("{{$key}}", $param, $url);
        }
        return $url;
    }

    public function getVersionSession()
    {
        return $this->requestStack->getSession()->get('version');
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $options
     * @return array|null
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    private function request(string $url, string $method, array $options): ?array
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
}
