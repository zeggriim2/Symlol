<?php

namespace App\Tests;

use App\Service\API\LOL\DataDragon\GeneralApi;
use App\Service\API\LOL\DataDragon\models\GameMode;
use App\Service\API\LOL\DataDragon\models\GameType;
use App\Service\API\LOL\DataDragon\models\Map;
use App\Service\API\LOL\DataDragon\models\Queue;
use App\Service\API\LOL\DataDragon\models\Season;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GeneralApiTest extends KernelTestCase
{
    /**
     *
     * @var GeneralApi
     */
    private $generalApi;

    protected function setUp(): void
    {
        $this->generalApi = static::getContainer()->get(GeneralApi::class);
    }

    public function testLanguaguesValid(): void
    {
        $languages = $this->generalApi->getAllLanguages();
        $this->assertIsArray($languages);
    }

    public function testSeasonValid() 
    {
        $seasons = $this->generalApi->getSeason();
        $this->assertIsArray($seasons);

        
        $this->checkAssertInstanceOf(Season::class, $seasons);
    }

    public function testQueueValid() 
    {
        $queues = $this->generalApi->getQueues();
        $this->assertIsArray($queues);

        $this->checkAssertInstanceOf(Queue::class, $queues);
    }

    public function testMapValid()
    {
        $maps = $this->generalApi->getMaps();
        $this->assertIsArray($maps);

        $this->checkAssertInstanceOf(Map::class, $maps);
    }

    public function testGameMode()
    {
        $gameModes = $this->generalApi->getsGameModes();
        $this->assertIsArray($gameModes);

        $this->checkAssertInstanceOf(GameMode::class, $gameModes);
    }

    public function testGameType()
    {
        $gameTypes = $this->generalApi->getsGameTypes();
        $this->assertIsArray($gameTypes);

        $this->checkAssertInstanceOf(GameType::class, $gameTypes);
    }

    private function checkAssertInstanceOf(string $expected, $actuals)
    {
        foreach ($actuals as $actual) {
            $this->assertInstanceOf($expected, $actual);
        }
    }
}
