<?php

namespace App\Controller;

use App\Form\SummonerType;
use App\Service\API\LOL\LeagueApi;
use App\Service\API\LOL\MatchApi;
use App\Service\API\LOL\SummonerApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SummonerController extends AbstractController
{
    /**
     * @var SummonerApi
     */
    private $summonerApi;

    /**
     * @var RequestStack
     */
    private $requestStack;
    /**
     * @var LeagueApi
     */
    private $leagueApi;
    /**
     * @var MatchApi
     */
    private $matchApi;

    /**
     * SummonerController constructor.
     * @param SummonerApi $summonerApi
     * @param LeagueApi $leagueApi
     * @param MatchApi $matchApi
     * @param RequestStack $requestStack
     */
    public function __construct(
        SummonerApi $summonerApi,
        LeagueApi $leagueApi,
        MatchApi $matchApi,
        RequestStack $requestStack
    ) {
        $this->summonerApi = $summonerApi;
        $this->leagueApi = $leagueApi;
        $this->matchApi = $matchApi;
        $this->requestStack = $requestStack;
    }


    /**
     * @Route("/summoner", name="summoner_index")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(SummonerType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->requestStack->getSession()->set('platform', $data['platform']);
            return $this->redirectToRoute("summoner_show", ['name' => $data['name']]);
        }

        return $this->render('summoner/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/summoner/{name}", name="summoner_show")
     */
    public function show(string $name): Response
    {
        $platform = $this->requestStack->getSession()->get('platform'); // Recup la platform en session

        $summoner   = $this->summonerApi->getSummoner($platform, $name);
        if (is_null($summoner)) {
            $this->addFlash('summoner', 'Summoners Non trouvé');
            return $this->redirectToRoute('summoner_index');
        }

        $matchsDetail       = $this->matchApi->getMatchs($summoner["puuid"], $platform);
        $infoSummonerleague = $this->leagueApi->getInfoSummoner($platform, $summoner['id']);
        $leagueSummoner     = $this->leagueApi->getLeagueId($platform, $infoSummonerleague[0]['leagueId']);
        $leagues            = $this->trieParRank($leagueSummoner['entries']);
        $this->descendingSort($leagues[$infoSummonerleague[0]['rank']], "leaguePoints");

        $matchSummoner = [];
        foreach ($matchsDetail as $matchId => $data) {
            $matchSummoner[$matchId] = $data["info"]["participants"][array_search($summoner["puuid"], $data["metadata"]["participants"])];
        }
        dump($matchsDetail, $summoner, $matchSummoner);
        return $this->render('summoner/show.html.twig', [
            'summoner'              => $summoner,
            'infoSummonerleague'    => $infoSummonerleague[0],
            'leagues'               => $leagues[$infoSummonerleague[0]['rank']],
            'matchsDetail'          => $matchsDetail,
            "matchSummoner"         => $matchSummoner
        ]);
    }

    /**
     * @param array $data
     * @param string $field
     */
    private function descendingSort(array &$data, string $field)
    {
        usort($data, function ($item1, $item2) use ($field) {
            return $item2[$field] <=> $item1[$field];
        });
    }

    /**
     * @param array $datas
     * @return array|null
     */
    private function trieParRank(array $datas): ?array
    {
        $league = [];
        foreach ($datas as $key => $summonerRank) {
            switch ($summonerRank['rank']) {
                case "I":
                    $league['I'][] = $summonerRank;
                    break;
                case "II":
                    $league['II'][] = $summonerRank;
                    break;
                case "III":
                    $league['III'][] = $summonerRank;
                    break;
                case "IV":
                    $league['IV'][] = $summonerRank;
                    break;
            }
        }
        if (empty($league)) {
            return null;
        }
        return $league;
    }
}
