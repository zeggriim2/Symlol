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
            'champion' => $champion
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

        $chartLabels = [];
        $chartColor = [];
        $chartData = [];
        foreach ($data as $label => $value) {
            $chartLabels[] = $label;
            $chartData[] = $value;
            $chartColor[] = $this->randomColor();
        }
        $chart = $chartBuilder->createChart(Chart::TYPE_POLAR_AREA);
        $chart->setData([
            'labels' => $chartLabels,
            'datasets' => [
                [
                    'label'             => 'Stats ' . $champion['id'],
                    'backgroundColor'   => $chartColor,
//                    'backgroundColor'   => "#fffff",
                    'borderColor'       => "#f7f7f7",
                    'data'              => $chartData,
                ],
            ],
        ]);
//        dd($chartData, $chartLabels, $champion['id']);

        return $this->render('champion/show.html.twig', [
            'champion' => $champion,
            'chart' => $chart
        ]);
    }

    /**
     * @Route("/champion/stats", name="statAll")
     * @return Response
     */
    public function statAll(): Response
    {
        // Récupere tous les champion de LOL
        $champions = $this->championApi->getAllChampion()['data'];

        //Récupération des stats de chaque champion
        $nameChampion = [];
        $data = [];
        foreach ($champions as $champion) {
            $nameChampion[] = $champion['name'];
            foreach ($champion['stats'] as $label => $value) {
                if ($label === 'hp') {
                    $data['HP']['data'][] = $value;
                    $data['HP']['title'] = 'Statiques Champions point de vie';
                    $data['HP']['dataset'] = 'Hp';
                } elseif ($label === 'armor') {
                    $data['ARMOR']['data'][] = $value;
                    $data['ARMOR']['title'] = 'Statiques Champions armure';
                    $data['ARMOR']['dataset'] = 'Armor';
                } elseif ($label === 'attackrange') {
                    $data['ATTACKRANGE']['data'][] = $value;
                    $data['ATTACKRANGE']['title'] = 'Statiques Champions range d\'attaque';
                    $data['ATTACKRANGE']['dataset'] = 'Attaque Range';
                } elseif ($label === 'attackdamage') {
                    $data['ATTACKDOMMAGE']['data'][] = $value;
                    $data['ATTACKDOMMAGE']['title'] = 'Statiques Champions dommage d\'attaque';
                    $data['ATTACKDOMMAGE']['dataset'] = 'Attaque Dommage';
                } elseif ($label === 'mp') {
                    $data['MP']['data'][] = $value;
                    $data['MP']['title'] = '';
                    $data['MP']['dataset'] = 'Mp';
                } elseif ($label === 'movespeed') {
                    $data['MOVESPEED']['data'][] = $value;
                    $data['MOVESPEED']['title'] = 'Statiques vitesse de déplacement';
                    $data['MOVESPEED']['dataset'] = 'Move Speed';
                }
            }
        }
        $charts = [];
        foreach ($data as $label => $value) {
            $charts[] = $this->buildChart(
                Chart::TYPE_BAR,
                $value['data'],
                $nameChampion,
                $value['dataset'],
                $value['title'],
                $this->randomColor()
            );
        }

        return $this->render('champion/statsAll.html.twig', [
            'charts' => $charts
        ]);
    }


    /**
     * @return int
     */
    private function randomColorPart(): int
    {
        return mt_rand(0, 255);
    }

    /**
     * @param int $opacity
     * @return string
     */
    private function randomColor(int $opacity = 0): string
    {
        $valOpacity = $opacity ? ",$opacity" : "";
        return "rgba(" . $this->randomColorPart() . ", " . $this->randomColorPart() . ", " . $this->randomColorPart()
            . " $valOpacity)";
    }

    /**
     * @param string $name
     * @return bool
     */
    private function checkNameChampion(string $name): bool
    {
        $nameChampion = $this->championApi->getAllNameChampion();
        return in_array(ucfirst($name), $nameChampion);
    }

    /**
     * @param string $type
     * @param array $data
     * @param array $label
     * @param string $datasetLabel
     * @param string $title
     * @param string $backgroundColor
     * @return Chart
     */
    private function buildChart(
        string $type,
        array $data,
        array $label,
        string $datasetLabel,
        string $title = '',
        string $backgroundColor = '#000000'
    ): Chart {

        $chart = new Chart($type);
        $chart->setData([
            'labels' => $label,
            'datasets' =>
                [
                    [
                        'label' => $datasetLabel,
                        'backgroundColor' => $backgroundColor,
                        'data' => $data,
                    ],
                ],
        ]);

        $chart->setOptions([
            'title' => [
                'display' => true,
                'fullSize' => true,
                'text' => $title,
                'color' => $backgroundColor,
            ],
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0, 'max' => round(max($data), 0, PHP_ROUND_HALF_EVEN)]],
                ],
            ],
        ]);
        return $chart;
    }
}
