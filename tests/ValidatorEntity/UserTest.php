<?php

namespace App\Tests\Validator;

use App\Entity\User;
use App\Service\API\models\Config\Platform;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;
use Symfony\Component\Validator\Validator\TraceableValidator;

class UserTest extends KernelTestCase
{
    /** @var AbstractDatabaseTool */
    protected $databaseTool;

    protected function setUp(): void
    {
        parent::setUp();

        self::bootKernel();
        // $this->databaseTool = self::getContainer()->get(DatabaseToolCollection::class)->get();
    }

    private function getEntity(): User
    {
        $user = (new User)
                ->setEmail("lilian.dorazio@hotmail.fr")
                ->setPlatform(Platform::BR1)
                ->setPseudo("Jarkalien")
        ;
        return $user;
    }

    private function assertHasError(User $user, int $number = 0)
    {
        // Récupération du Validator dans le container
        /** @var TraceableValidator $validate */
        $validate = self::getContainer()->get('validator');
        $error = $validate->validate($user);

        $this->assertCount($number, $error);
    }

    public function testValideEntity()
    {
        // Récupération du User test
        $user = $this->getEntity();

        $this->assertHasError($user, 0);
    }

    public function testInvalideBlankEmailEntity()
    {
        // Récupération du User test
        $user = $this->getEntity();
        // Modification de l'EMAIL en vide
        $user->setEmail('');
        $this->assertHasError($user, 1);
    }

    public function testInvalideBlankPseudoEntity()
    {
        // Récupération du User test
        $user = $this->getEntity();
        // Modification le PSEUDO en vide
        $user->setPseudo('');
        $this->assertHasError($user, 1);
    }

    public function testInvalideBlankPlatformEntity()
    {
        // Récupération du User test
        $user = $this->getEntity();
        // Modification la PLATFORM en vide
        $user->setPlatform('');
        $this->assertHasError($user, 1);
    }
}
