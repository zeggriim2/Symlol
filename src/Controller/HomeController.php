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
     */
    public function index(ChampionApi $championApi): Response
    {
        $champions = $championApi->GetAllChampion()['data'];
        return $this->render('home/index.html.twig', [
            'champions' => $champions,
        ]);
    }
//    public function test(ChartBuilderInterface $chartBuilder)
//    {
//        $nameArray = [];
//        foreach($champions as $name => $data){
//            $dataLife[] = $data['stats']['hp'];
//            $dataArmor[] = $data['stats']['armor'];
//            $nameArray[] = $name;
//        }
//
//        $chart = $chartBuilder->createChart(Chart::TYPE_BAR);
//        $chart->setData([
//            'labels' => $nameArray,
//            'datasets' => [
//                [
//                    'label' => 'Life',
//                    'backgroundColor' => 'rgb(255, 99, 132)',
//                    'borderColor' => 'rgb(255, 99, 132)',
//                    'data' => $dataLife,
//                ],
//                [
//                    'label' => 'Armor',
//                    'backgroundColor' => 'rgb(255, 99, 255)',
//                    'borderColor' => 'rgb(255, 99, 255)',
//                    'data' => $dataArmor,
//                ],
//            ],
//        ]);
//
//        $chart->setOptions([
//            'scales' => [
//                'yAxes' => [
//                    ['ticks' => ['min' => 0, 'max' => 800]],
//                ],
//            ],
//        ]);
//    }
}
