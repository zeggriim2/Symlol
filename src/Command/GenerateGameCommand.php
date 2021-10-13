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

#[AsCommand(
    name: 'app:generateGame',
    description: 'Add a short description for your command',
)]
class GenerateGameCommand extends Command
{

    private $manager;

    protected function configure(): void
    {
        $this
            ->addArgument('twoLegged',InputArgument::OPTIONAL,'match aller-retour',false)
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $twoLegged = $input->getArgument('twoLegged');
        $groups = $this->manager->getRepository(Group::class)->findAll();
        
        foreach ($groups as $group) {
            $equipes = $this->manager->getRepository(Equipe::class)->findBy(['groupe' => $group->getId()]);
            // $equipe = $this->manager->getRepository(Equipe::class)->findGroupEquipe($group->getName());
            foreach ($equipes as $key => $equipe1) {
                foreach ($equipes as $equipe2) {
                    if($equipe1->getId() != $equipe2->getId()){
                        $game = new Game();
                        $game->setEquipe1($equipe1);
                        $game->setEquipe2($equipe2);

                        $this->manager->persist($game);
                    }
                    
                }
                if(!$twoLegged){
                    unset($equipes[$key]);
                }
            }
        }
        $this->manager->flush();
        $io = new SymfonyStyle($input, $output);
        // $arg1 = $input->getArgument('arg1');

        // if ($arg1) {
        //     $io->note(sprintf('You passed an argument: %s', $arg1));
        // }

        // if ($input->getOption('option1')) {
        //     // ...
        // }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
        parent::__construct();
    }
}
