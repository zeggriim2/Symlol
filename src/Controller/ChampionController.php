<?php

namespace App\Controller;

use App\Service\API\LOL\ChampionApi;
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
     * ChampionController constructor.
     */
    public function __construct(ChampionApi $championApi)
    {
        $this->championApi = $championApi;
    }


    /**
     * @Route("/champions", name="champions_index")
     */
    public function index(): Response
    {
        $champions = $this->championApi->GetAllChampion()['data'];
        return $this->render('champion/index.html.twig', [
            'champions' => $champions,
        ]);
    }

    /**
     * @Route("/champions/{name}", name="champions_showStat")
     */
    public function showStat(string $name, ChartBuilderInterface $chartBuilder)
    {
        $champion = $this->championApi->GetChampion($name)['data'][$name];
//        dd($champion);

        foreach ($champion['stats'] as $key => $value)
        {
            if(!strpos($key, "level")){
                $chartLabels[]  = $key;
                $chartData[]    = $value;
                $chartColor[]   = $this->random_color();
            }
        }

        $chart = $chartBuilder->createChart(Chart::TYPE_BAR);
        $chart->setData([
            'labels' => $chartLabels,
            'datasets' => [
                [
                    'label'             => 'My First dataset',
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
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    private function random_color() {
        return "#" . $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }
}
