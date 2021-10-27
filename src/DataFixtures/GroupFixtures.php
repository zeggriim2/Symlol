<?php

namespace App\DataFixtures;

use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class GroupFixtures extends Fixture implements FixtureGroupInterface
{
    private const GROUPS = ["A", "B", "C", "D"];

    public function load(ObjectManager $manager)
    {
        foreach (self::GROUPS as $nameGroup) {
            $group = new Group();
            $group->setName($nameGroup);
            $manager->persist($group);
        }
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['game'];
    }
}
