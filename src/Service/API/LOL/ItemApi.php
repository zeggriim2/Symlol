<?php

namespace App\Service\API\LOL;

class ItemApi extends BaseApi
{
    private const URL_ITEMS = "http://ddragon.leagueoflegends.com/cdn/{version}/data/{lang}/item.json";

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
            'version'   => $this->getLastVersion(),
            'lang'      => $this->lang
        ];
        $url = $this->constructUrl(self::URL_ITEMS, $data);
        return $this->callApi($url);
    }
}
