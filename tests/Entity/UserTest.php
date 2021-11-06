<?php

namespace App\Tests;

use App\Entity\User;
use App\Service\API\models\Config\Platform;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserTest extends KernelTestCase
{
    /**
     * @var UserPasswordHasherInterface
     */
    protected $userPassordhasher;

    protected function setUp(): void
    {
        parent::setUp();

        self::bootKernel();
        $this->userPassordhasher = self::getContainer()->get(UserPasswordHasherInterface::class);
    }


    public function getEntity(): User
    {
        $user = (new User())
            ->setPseudo("toto")
            ->setPlatform(Platform::BR1)
            ->setEmail("lilian.dorazio@hotmail.fr")
        ;
        $user->setPassword($this->userPassordhasher->hashPassword($user, "1234"));
        return $user;
    }

    public function assertHasErrors(User $user, int $number = 0)
    {
        $errors = self::getContainer()->get('validator')->validate($user);
        $this->assertCount($number,$errors);
    }

    public function testValidEntity()
    {
        $this->assertHasErrors($this->getEntity());
    }

    public function testInvalidEmailEntity()
    {
        $user = $this->getEntity()->setEmail('akrjgoizjrgi');
        $this->assertHasErrors($user,1);
    }

    public function testInvalidBlankEmail()
    {
        $user = $this->getEntity()->setEmail('');
        $this->assertHasErrors($user,1);
    }

    public function testInvalidBlankPseudo()
    {
        $user = $this->getEntity()->setPseudo('');
        $this->assertHasErrors($user,1);
    }

    public function testInvalidBlankPlatform()
    {
        $user = $this->getEntity()->setPlatform('');
        $this->assertHasErrors($user,1);
    }
}
