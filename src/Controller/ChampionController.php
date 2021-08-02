<?php

namespace App\Controller;

use App\Service\API\LOL\ChampionApi;
use Knp\Component\Pager\PaginatorInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ChampionController extends AbstractController
{
    private const DATA_STATS = ['armor', 'hp', 'attackdamage', 'attackrange', 'mp', 'movespeed'];

    /**
     * @var ChampionApi
     */
    private $championApi;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * ChampionController constructor.
     * @param ChampionApi $championApi
     * @param LoggerInterface $logger
     */
    public function __construct(ChampionApi $championApi, LoggerInterface $logger)
    {
        $this->championApi = $championApi;
        $this->logger = $logger;
    }


    /**
     * @Route("/champions", name="champions_index")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $champions = $this->championApi->getAllChampion()['data'];
        if (!$champions) {
            $this->logger->debug("Est ce que le log écrit", ['champions' => $champions]);
        }

        $champPag = $paginator->paginate(
            $champions,
            $request->query->getInt('page', 1),
            8
        );

        return $this->render('champion/index.html.twig', [
//            'champions' => $champions,
            'champions' => $champPag,
        ]);
    }

    /**
     * @Route("/champion/skins/{name}", name="champion_skins")
     * @param string $name
     * @param ChartBuilderInterface $chartBuilder
     * @return Response
     */
    public function skins(string $name, ChartBuilderInterface $chartBuilder)
    {

        // Vérification du Nom du champion
        $val = $this->checkNameChampion($name);
        if (!$val) {
            return $this->redirectToRoute("champions_index");
        }

        $champion = $this->championApi->getChampion($name)['data'][$name];

        return $this->render('champion/skins.html.twig', [
            'champion'  => $champion
        ]);
    }

    /**
     * @Route("/champion/stat/{name}", name="champion_showStat")
     * @param string $name
     * @param ChartBuilderInterface $chartBuilder
     * @return Response
     */
    public function showStat(string $name, ChartBuilderInterface $chartBuilder)
    {
        // Vérification du Nom du champion
        $val = $this->checkNameChampion($name);
        if (!$val) {
            return $this->redirectToRoute("champions_index");
        }

        $champion = $this->championApi->getChampion($name)['data'][$name];
//        dd($champion);

        $data = null;
        foreach ($champion['stats'] as $key => $value) {
            if (!strpos($key, "level")) {
                $data[$key] = $value;
            }
        }

        if (isset($data)) {
            arsort($data);
        }

        $chartLabels = [];
        $chartColor = [];
        $chartData = [];
        foreach ($data as $label => $value) {
            $chartLabels[]  = $label;
            $chartData[]    = $value;
            $chartColor[]   = $this->randomColor();
        }
        $chart = $chartBuilder->createChart(Chart::TYPE_BAR);
        $chart->setData([
            'labels' => $chartLabels,
            'datasets' => [
                [
//                    'label'             => 'Stats ' . $champion['id'],
                    'label'             => ['stat','stat2'],
                    'backgroundColor'   => $chartColor,
//                    'backgroundColor'   => "#fffff",
                    'borderColor'       => "#f7f7f7",
                    'data' => $chartData,
                ],
            ],
        ]);
//        dd($chartData, $chartLabels, $champion['id']);

        return $this->render('champion/show.html.twig', [
            'champion'  => $champion,
            'chart'     => $chart
        ]);
    }

    /**
     * @Route("/champion/stats", name="statAll")
     * @param ChartBuilderInterface $chartBuilder
     * @return Response
     */
    public function statAll(ChartBuilderInterface $chartBuilder): Response
    {
        // Récupere tous les champion de LOL
        $champions = $this->championApi->getAllChampion()['data'];
//        dd($champions);
        //Récupération des stats de chaque champion
        $nameChampion = [];
        $data = [];
        foreach ($champions as $champion) {
            $nameChampion[] = $champion['name'];
            foreach ($champion['stats'] as $label => $value) {
                if ($label === 'hp') {
                    $data['HP'][] = $value;
                } elseif ($label === 'armor') {
                    $data['ARMOR'][] = $value;
                } elseif ($label === 'attackrange') {
                    $data['ATTACKRANGE'][] = $value;
                } elseif ($label === 'attackdamage') {
                    $data['ATTACKDOMMAGE'][] = $value;
                } elseif ($label === 'mp') {
                    $data['MP'][] = $value;
                }
            }
        }
        $charts = [];
        $charts[] = $this->buildChart(
            Chart::TYPE_BAR,
            $data['HP'],
            $nameChampion,
            'HP',
            '#3262a8'
        );


        $charts[] = $this->buildChart(
            Chart::TYPE_BAR,
            $data['ARMOR'],
            $nameChampion,
            'Armor',
            '#d104ca'
        );
        $charts[] = $this->buildChart(
            Chart::TYPE_BAR,
            $data['ARMOR'],
            $nameChampion,
            'Armor',
            '#d104ca'
        );
        $charts[] = $this->buildChart(
            Chart::TYPE_BAR,
            $data['ATTACKRANGE'],
            $nameChampion,
            'AttackRange',
            '#22d6d0'
        );
        $charts[] = $this->buildChart(
            Chart::TYPE_BAR,
            $data['ATTACKDOMMAGE'],
            $nameChampion,
            'AttackDommage',
            '#d62225'
        );

        $charts[] = $this->buildChart(
            Chart::TYPE_BAR,
            $data['MP'],
            $nameChampion,
            'MP',
            '#d62225'
        );

        return $this->render('champion/statsAll.html.twig', [
            'charts' => $charts
        ]);
    }


    private function randomColorPart(): int
    {
        return mt_rand(0, 255);
    }

    private function randomColor(): string
    {
//        rgba(255, 159, 64, 0.2);
        return "rgba(" . $this->randomColorPart() . ", " . $this->randomColorPart() . ", " . $this->randomColorPart() . ", 0.2)";
    }

    private function checkNameChampion(string $name): bool
    {
        $nameChampion = $this->championApi->getAllNameChampion();
        return in_array(ucfirst($name), $nameChampion);
    }

    private function buildChart(
        string $type,
        array $data,
        $label,
        $datasetLabel,
        string $backgroundColor = '#000000'
    ): Chart {

        $chart = new Chart($type);
        $chart->setData([
            'labels' => $label,
            'datasets' =>
                [
                    [
                        'label'             => $datasetLabel,
                        'backgroundColor'   => $backgroundColor,
                        'data' => $data,
                    ],
                ],
        ]);

        $chart->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0, 'max' => round(max($data), 0, PHP_ROUND_HALF_EVEN)]],
                ],
            ],
        ]);
        return $chart;
    }
}
