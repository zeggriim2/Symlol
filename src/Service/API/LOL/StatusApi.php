<?php


namespace App\Service\API\LOL;


use App\Service\API\models\PlatformData;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class StatusApi
{
    private const URL_STATUS_PLATFORM = "https://{platform}.api.riotgames.com/lol/status/v4/platform-data";

    /**
     * @var BaseApi
     */
    private BaseApi $baseApi;
    /**
     * @var DenormalizerInterface
     */
    private DenormalizerInterface $denormalizer;


    /**
     * StatusApi constructor.
     * @param BaseApi $baseApi
     * @param DenormalizerInterface $denormalizer
     */
    public function __construct(
        BaseApi $baseApi,
        DenormalizerInterface $denormalizer
    )
    {
        $this->baseApi = $baseApi;
        $this->denormalizer = $denormalizer;
    }

    public function getStatusPlatform(
        string $platform
    ): PlatformData
    {
        $url = $this->baseApi->constructUrl(
            self::URL_STATUS_PLATFORM,
            [
                "platform"  => $platform
            ]
        );

        $statusPlatform = $this->baseApi->callApi($url, "GET", [
            'headers' => [
                'X-Riot-Token' => $this->baseApi->apiKey,
            ]
        ]);

        return $this->denormalizer->denormalize($statusPlatform, PlatformData::class);
    }
}