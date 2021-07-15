<?php

namespace App\Controller;

use App\Service\API\LOL\ApiClient;
use App\Service\API\LOL\ChampionApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @param ChampionApi $championApi
     * @return Response
     */
    public function index(ChampionApi $championApi): Response
    {
        $champions = $championApi->GetAllChampion()['data'];
        return $this->render('home/index.html.twig', [
            'champions' => $champions,
        ]);
    }
}
