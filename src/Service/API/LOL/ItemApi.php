<?php

namespace App\Service\API\LOL;

class ItemApi
{
    private const URL_ITEMS = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/item.json";

    /**
     * @var BaseApi
     */
    private $baseApi;

    /**
     * ItemApi constructor.
     * @param BaseApi $baseApi
     */
    public function __construct(BaseApi $baseApi)
    {
        $this->baseApi = $baseApi;
    }


    /**
     * @return array|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getAllItem(): ?array
    {
        $data = [
//            'version'   => $this->baseApi->getLastVersion(),
            'version'   => $this->baseApi->sessionVersion,
            'lang'      => $this->baseApi->lang
        ];
        $url = $this->baseApi->constructUrl(self::URL_ITEMS, $data);
        return $this->baseApi->callApiCache($url);
    }
}
