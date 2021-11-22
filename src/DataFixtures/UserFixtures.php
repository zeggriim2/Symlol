<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Service\API\models\Config\Platform;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('lilian.dorazio@hotmail.fr');
        $user->setPlatform(Platform::EUW1);
        $user->setPseudo('jarkalien');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->hasher->hashPassword($user, '1234'));
        $manager->persist($user);
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['game'];
    }
}
