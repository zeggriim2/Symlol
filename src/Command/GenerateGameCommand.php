<?php

namespace App\Command;

use App\Entity\Equipe;
use App\Entity\Game;
use App\Entity\Group;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

//#[AsCommand(
//    name: 'outil:generateGame',
//    description: 'Add a short description for your command',
//)]
class GenerateGameCommand extends Command
{

    protected static $defaultName = "outil:generateGame";
    protected static $defaultDescription = "Genere les games entre les différentes equipe par groupe associé";

    private $manager;

    protected function configure(): void
    {
        $this
            ->addArgument('twoLegged',InputArgument::OPTIONAL,'match aller-retour',false)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $twoLegged = $input->getArgument('twoLegged');
        $groups = $this->manager->getRepository(Group::class)->findAll();

        foreach ($groups as $group) {
            $equipes = $this->manager->getRepository(Equipe::class)->findBy(['groupe' => $group->getId()]);
            foreach ($equipes as $key => $equipe1) {
                foreach ($equipes as $equipe2) {
                    if($equipe1->getId() != $equipe2->getId()){
                        if(!$this->duelExistBetweenTwoEquipe()) {
                            $game = new Game();
                            $game->setEquipe1($equipe1)
                                ->setEquipe2($equipe2)
                            ;

                            $this->manager->persist($game);
                        }
                    }
                    
                }
                if(!$twoLegged){
                    unset($equipes[$key]);
                }
            }
        }
        $this->manager->flush();
        $io = new SymfonyStyle($input, $output);

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }

    private function duelExistBetweenTwoEquipe(Equipe $equipe1,Equipe $equipe2)
    {
        return $this->manager->getRepository(Game::class)->duelExistBetweenTwoEquipe($equipe1, $equipe2);
    }

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
        parent::__construct();
    }
}
