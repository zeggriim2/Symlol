<?php

namespace App\Controller;

use App\Service\API\LOL\ApiClient;
use App\Service\API\LOL\ChampionApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/home", name="home")
     */
    public function index(ChampionApi $championApi): Response
    {
        $champions = $championApi->GetAllChampion()['data'];
        return $this->render('home/index.html.twig', [
            'champions' => $champions,
        ]);
    }
}
