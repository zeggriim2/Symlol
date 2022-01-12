<?php

namespace App\Controller;

use App\Service\API\LOL\ChampionApi;
use App\Form\LevelChampionType;
use Knp\Component\Pager\PaginatorInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
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
     * @var RequestStack
     */
    private $requestStack;

    /**
     * ChampionController constructor.
     * @param ChampionApi $championApi
     * @param RequestStack $requestStack
     * @param LoggerInterface $logger
     */
    public function __construct(ChampionApi $championApi, RequestStack $requestStack, LoggerInterface $logger)
    {
        $this->championApi = $championApi;
        $this->requestStack = $requestStack;
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
     * @param Request $request
     * @return Response
     */
    public function statAll(Request $request): Response
    {
        // Récupere tous les champion de LOL
        $champions = $this->championApi->getAllChampion()['data'];

        //Formulaire pour récupérer les stats par rapport au level des champions
        $form = $this->createForm(LevelChampionType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->requestStack->getSession()->set('StatChampionlevel', $data['level']);
        }
        $level = $this->requestStack->getSession()->get('StatChampionlevel');

        //Top des champions à chaque stats
        $championMoreHp = [
            'name' => "",
            'result' => 0
        ];
        $championMoreAttack = [
            'name' => "",
            'result' => 0
        ];
        $championMoreArmor = [
            'name' => "",
            'result' => 0
        ];
        $championMoreMp = [
            'name' => "",
            'result' => 0
        ];

        //Récupération des stats de chaque champion
        $nameChampion = [];
        $data = [];
        foreach ($champions as $champion) {
            $nameChampion[] = $champion['name'];

            //Recherche les champions ayant le plus de HP, le plus d'attaque, le plus d'Armure et le plus de mp
            $tempHpWithLvl = $champion['stats']['hp'] + ($champion['stats']['hpperlevel'] * $level);
            $tempArmorWithLvl = $champion['stats']['armor'] + ($champion['stats']['armorperlevel'] * $level);
            $tempAttackWithLvl = $champion['stats']['attackdamage']
                + ($champion['stats']['attackdamageperlevel'] * $level);
            $tempMpWithLvl = $champion['partype'] == 'Mana' ? $champion['stats']['mp']
                + ($champion['stats']['mpperlevel'] * $level) : 0;

            $championMoreMp = $this->compareChampionPerStat($championMoreMp, $tempMpWithLvl, $champion['name']);
            $championMoreHp = $this->compareChampionPerStat($championMoreHp, $tempHpWithLvl, $champion['name']);
            $championMoreAttack = $this->compareChampionPerStat(
                $championMoreAttack,
                $tempAttackWithLvl,
                $champion['name']
            );
            $championMoreArmor = $this->compareChampionPerStat(
                $championMoreArmor,
                $tempArmorWithLvl,
                $champion['name']
            );


            //Mise en place des variables pour les tableaux de statistique
            foreach ($champion['stats'] as $label => $value) {
                if ($label === 'hp') {
                    $data['HP']['data'][] = $value + ($champion['stats']['hpperlevel'] * $level);
                    $data['HP']['title'] = 'Statiques Champions point de vie';
                    $data['HP']['dataset'] = 'Hp';
                } elseif ($label === 'armor') {
                    $data['ARMOR']['data'][] = $value + ($champion['stats']['armorperlevel'] * $level);
                    $data['ARMOR']['title'] = 'Statiques Champions armure';
                    $data['ARMOR']['dataset'] = 'Armor';
                } elseif ($label === 'attackrange') {
                    $data['ATTACKRANGE']['data'][] = $value;
                    $data['ATTACKRANGE']['title'] = 'Statiques Champions range d\'attaque';
                    $data['ATTACKRANGE']['dataset'] = 'Attaque Range';
                } elseif ($label === 'attackdamage') {
                    $data['ATTACKDOMMAGE']['data'][] = $value + ($champion['stats']['attackdamageperlevel'] * $level);
                    $data['ATTACKDOMMAGE']['title'] = 'Statiques Champions dommage d\'attaque';
                    $data['ATTACKDOMMAGE']['dataset'] = 'Attaque Dommage';
                } elseif ($label === 'mp') {
                    $data['MP']['data'][] = $champion['partype'] == 'Mana' ? $value
                        + ($champion['stats']['mpperlevel'] * $level) : 0;
                    $data['MP']['title'] = 'Statistique Mana';
                    $data['MP']['dataset'] = 'Mana';
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
            'charts' => $charts,
            'form' => $form->createView(),
            'championMoreHp' => $championMoreHp,
            'championMoreArmor' => $championMoreArmor,
            'championMoreAttack' => $championMoreAttack,
            'championMoreMp' => $championMoreMp,
        ]);
    }

    /**
     * @return array
     */
    private function compareChampionPerStat(array $champion, float $temp, string $championName): array
    {
        if ($champion['name'] == "") {
            $champion['name'] = $championName;
            $champion['result'] = $temp;
        } elseif ($champion['result'] < $temp) {
            $champion['name'] = $championName;
            $champion['result'] = $temp;
        }
        return $champion;
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
