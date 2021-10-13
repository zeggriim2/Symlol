<?php

namespace App\DataFixtures;

use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GameFixtures extends Fixture
{
    const EQUIPE = [
        'FunPlus Phoenix'       => 'A', 
        'Rogue'                 => 'A',
        'Cloud9'                => 'A',
        'DWG KIA'               => 'A',
        'Edward Gaming'         => 'B',
        'T1'                    => 'B',
        '100 Thieves'           => 'B',
        'Detonation FocusMe'    => 'B',
        'Hanwha Life Esports'   => 'C',
        'Royal Never Give Up'   => 'C',
        'Fnatic'                => 'C',
        'PSG Talon'             => 'C',
        'Gen.G'                 => 'D',
        'Team Liquid'           => 'D',
        'LNG Esport'            => 'D',
        'MAD Lions'             => 'D',    
    ];

    const GROUP = ['A','B','C','D'];

    public function load(ObjectManager $manager)
    {
        
        $groups = $manager->getRepository(Group::class)->findAll();
        foreach ($groups as $key => $value) {
            dd($value);
        }


        // $product = new Product();
        // $manager->persist($product);
        $manager->flush();
    }
}
