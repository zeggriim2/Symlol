<?php

namespace App\Command;

use App\Entity\Equipe;
use App\Entity\Game;
use App\Service\API\LOL\RankApi;
use App\Service\API\models\Config\Platform;
use App\Service\API\models\Config\Queue;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GetAllStatChallengerCommand extends Command
{

    protected static $defaultName = "outil:getAllStatChallenger";
    protected static $defaultDescription = "Genere les games entre les différentes equipe par groupe associé";

    private $manager;
    private $rankApi;

    protected function configure(): void
    {
        $this
            ->addArgument('twoLegged', InputArgument::OPTIONAL, 'match aller-retour', false)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $ladderChallenger = $this->rankApi->getLadder(Platform::EUW1, Queue::RANK_SOLO, "challenger");

        $io = new SymfonyStyle($input, $output);

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }

    private function duelExistBetweenTwoEquipe(Equipe $equipe1, Equipe $equipe2)
    {
        return $this->manager->getRepository(Game::class)->duelExistBetweenTwoEquipe($equipe1, $equipe2);
    }

    public function __construct(
        EntityManagerInterface $manager,
        RankApi $rankApi
    ) {
        $this->rankApi = $rankApi;
        $this->manager = $manager;
        parent::__construct();
    }
}
