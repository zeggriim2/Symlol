<?php

namespace App\Tests\Validator;

use App\Entity\Suggestion;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;

class SuggestionTest extends KernelTestCase
{
    /** @var AbstractDatabaseTool */
    protected $databaseTool;

    protected function setUp(): void
    {
        parent::setUp();

        self::bootKernel();
        // $this->databaseTool = self::getContainer()->get(DatabaseToolCollection::class)->get();
    }

    private function getEntity(): Suggestion
    {
        $suggestion = (new Suggestion)
              
        ;
        return $suggestion;
    }

    private function assertHasError(Suggestion $suggestion, int $number = 0)
    {
        // Récupération du Validator dans le container
        /** @var TraceableValidator $validate */
        $validate = self::getContainer()->get('validator');
        $error = $validate->validate($suggestion);

        $this->assertCount($number, $error);
    }
}