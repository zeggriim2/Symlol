<?php

namespace App\Controller;

use App\Service\API\LOL\ChampionApi;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ChampionController extends AbstractController
{
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
     */
    public function index(): Response
    {
        $champions = $this->championApi->getAllChampion()['data'];
        if (!$champions){
            $this->logger->debug("Est ce que le log écrit",['champions' => $champions]);
        }

        return $this->render('champion/index.html.twig', [
            'champions' => $champions,
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
        if(!$val){
            return $this->redirectToRoute("champions_index");
        }

        $champion = $this->championApi->getChampion($name)['data'][$name];

        return $this->render('champion/skins.html.twig',[
            'champion'  => $champion
        ]);
    }

    /**
     * @Route("/champion/stats/{name}", name="champion_showStat")
     * @param string $name
     * @param ChartBuilderInterface $chartBuilder
     * @return Response
     */
    public function showStat(string $name, ChartBuilderInterface $chartBuilder)
    {
        // Vérification du Nom du champion
        $val = $this->checkNameChampion($name);
        if(!$val){
            return $this->redirectToRoute("champions_index");
        }

        $champion = $this->championApi->getChampion($name)['data'][$name];
//        dd($champion);


        foreach ($champion['stats'] as $key => $value)
        {
            if(!strpos($key, "level")){
                $data[$key] = $value;
            }
        }

        arsort($data);
        foreach($data as $label => $value)
        {
            $chartLabels[]  = $label;
            $chartData[]    = $value;
            $chartColor[]   = $this->random_color();
        }

        $chart = $chartBuilder->createChart(Chart::TYPE_RADAR);
        $chart->setData([
            'labels' => $chartLabels,
            'datasets' => [
                [
                    'label'             => 'Stats ' . $champion['id'],
                    'backgroundColor'   => $chartColor,
                    'borderColor'       => "#f7f7f7",
                    'data' => $chartData,
                ],
            ],
        ]);

        return $this->render('champion/show.html.twig',[
            'champion'  => $champion,
            'chart'     => $chart
        ]);
    }

    private function random_color_part() {
//        $rgb = str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
        return mt_rand(0, 255 );
    }

    private function random_color() {
//        rgba(255, 159, 64, 0.2);
        return "rgba(" . $this->random_color_part() . ", " . $this->random_color_part() . ", " . $this->random_color_part() . ", 0.2)";
    }

    private function checkNameChampion(string $name): bool
    {
        $nameChampion = $this->championApi->getAllNameChampion();
        return in_array(ucfirst($name), $nameChampion) ? true : false;
    }
}
