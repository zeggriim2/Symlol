<?php

namespace App\DataFixtures;

use App\Entity\Equipe;
use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EquipeFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    private $EQUIPE = [
        "FunPlus Phoenix" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/1568/fun_plus_phoenixlogo_square.png",
            "group" => "A"
        ],
        "DWG KIA" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/128409/dwg_ki_alogo_square.png",
            "group" => "A"
        ],
        "Rogue" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/3983/rogue__28_european_team_29logo_square.png",
            "group" => "A"
        ],
        "Cloud9" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/1097/cloud9-gnd9b0gn.png",
            "group" => "A"
        ],
        "EDward Gaming" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/405/edward-gaming-52bsed1a.png",
            "group" => "B"
        ],
        "100 Thieves" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/1537/100_thieves_alternatelogo_square.png",
            "group" => "B"
        ],
        "T1" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/126061/t_oscq04.png",
            "group" => "B"
        ],
        "DetonatioN FocusMe" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/89/detonation-focusme-fpnjh4v7.png",
            "group" => "B"
        ],
        "Royal Never Five Up" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/74/royal-never-give-up-cyacqft1.png",
            "group" => "C"
        ],
        "Hanwha Life Esports" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/2883/hanwha-life-esports-1s04vbu0.png",
            "group" => "C"
        ],
        "PSG Talon" => [
            "logo " => "https://cdn.pandascore.co/images/team/image/126702/220px_psg_talonlogo_square.png",
            "group" => "C"
        ],
        "Fnatic" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/394/220px_fnaticlogo_square.png",
            "group" => "C"
        ],
        "MAD LIONS" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/126536/220px_mad_lions_e.c.__lec_team_logo_profile.png",
            "group" => "D"
        ],
        "Team Liquid" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/390/liquid.png",
            "group" => "D"
        ],
        "Gen.G" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/2882/geng-hooir6i9.png",
            "group" => "D"
        ],
        "LNG Esports" => [
            "logo" => "https://cdn.pandascore.co/images/team/image/126058/_.png",
            "group" => "D"
        ]
    ];

    public function load(ObjectManager $manager)
    {
        $groups = $manager->getRepository(Group::class)->findAll();
        $faker = Factory::create("fr_FR");


        foreach ($groups as $key => $group){
            foreach ($this->EQUIPE as $nameEquipe => $data) {
                if ($group->getName() === $data['group']){
                    $equipe = new Equipe();
                    $equipe->setName($nameEquipe)
                        ->setGroupe($group)
                        ->setLogo("FUNFPLUSPHOENIX.png")
                    ;
                    $manager->persist($equipe);
                    unset($this->EQUIPE[$key]);
                }
            }
        }
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['game'];
    }

    public function getDependencies()
    {
        return [
            GroupFixtures::class
        ];
    }
}
