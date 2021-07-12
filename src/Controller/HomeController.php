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
     * @var ApiClient
     */
    private $apiClient;
    /**
     * @var mixed
     */
    private $version;
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient($_ENV['APIKEY'],null,'fr_FR');
//        $this->version = $this->apiClient->generalApi()->getLastVersion();
    }


    /**
     * @Route("/home", name="home")
     */
    public function index(ChampionApi $api): Response
    {
        $api->
        $champions = $this->apiClient->championApi()->GetAllChampion();

        return $this->render('home/index.html.twig', [
            'champions' => $champions,
            'version'   => $this->version
        ]);
    }

    /**
     * @Route("/static/{name}", name="stat_champ")
     * @param string $name
     * @return Response
     */
    public function statChampion(string $name, ChartBuilderInterface $chartBuilder)
    {
        $champion = $this->apiClient->championApi()->getChampion($name);
        foreach ($champion['stats'] as $key => $data)
        {
            $label[] = $key;
            $value[] = $data;
        }

        $chart = $chartBuilder->createChart(Chart::TYPE_PIE);
        $chart->setData([
            'labels' => $label,
            'datasets' => [
                [
                    'label' => 'Life',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $value,
                ]
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0, 'max' => 800]],
                ],
            ],
        ]);

        return $this->render('champion/statistiqueChampion.html.twig',[
            'champion'  => $champion,
            'chart'     => $chart
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
