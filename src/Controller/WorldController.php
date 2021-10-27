<?php

namespace App\Controller;

use App\Entity\Game;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WorldController extends AbstractController
{
    /**
     * @Route("/world", name="world_index")
     * @param GameRepository $gameRepository
     * @return Response
     */
    public function index(
        GameRepository $gameRepository
    ): Response {
        $games = $gameRepository->findBy([], ['dateGame' => 'ASC']);

        return $this->render('world/index.html.twig', [
            'games' => $games,
        ]);
    }
}
