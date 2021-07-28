<?php

namespace App\Controller;

use App\Form\SummonerType;
use App\Service\API\LOL\LeagueApi;
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
     * SummonerController constructor.
     * @param SummonerApi $summonerApi
     * @param LeagueApi $leagueApi
     * @param RequestStack $requestStack
     */
    public function __construct(SummonerApi $summonerApi, LeagueApi $leagueApi, RequestStack $requestStack)
    {
        $this->summonerApi = $summonerApi;
        $this->leagueApi = $leagueApi;
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
        $platform = $this->requestStack->getSession()->get('platform');
        $summoner   = $this->summonerApi->getSummoner($platform, $name);
        if (is_null($summoner)) {
            $this->addFlash('summoner', 'Summoners Non trouvé');

            return $this->redirectToRoute('summoner_index');
        }
        $league     = $this->leagueApi->getInfoSummoner($platform, $summoner['id']);

        return $this->render('summoner/show.html.twig', [
            'summoner' => $summoner,
            'league'    => $league[0]
        ]);
    }
}
