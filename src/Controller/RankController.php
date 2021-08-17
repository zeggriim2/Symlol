<?php

namespace App\Controller;

use App\Form\RankType;
use App\Service\API\LOL\RankApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RankController extends AbstractController
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var RankApi
     */
    private $rankApi;

    /**
     * RankController constructor.
     * @param RequestStack $requestStack
     * @param RankApi $rankApi
     */
    public function __construct(RequestStack $requestStack, RankApi $rankApi)
    {
        $this->requestStack = $requestStack;
        $this->rankApi = $rankApi;
    }


    /**
     * @Route("/rank", name="rank_index")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(RankType::class);
        $form->handleRequest($request);

        $ladderChallengers = [];
        $data = [];
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $platform = $data['platform'];
            $league = $data['league'];
            $queue = $data['queue'];
            $ladderChallengers = $this->rankApi->getLadder($platform, $queue, $league)['entries'];
            $this->descendingSort($ladderChallengers, 'leaguePoints');
        }

        return $this->render('rank/index.html.twig', [
            'formRank'          => $form->createView(),
            'ladderChallengers' => $ladderChallengers,
            'title'             => $data
        ]);
    }

    private function ascendingSort(array &$data, string $field)
    {
        usort($data, function ($item1, $item2) use ($field) {
            return $item1[$field] <=> $item2[$field];
        });
    }

    private function descendingSort(array &$data, string $field)
    {
        usort($data, function ($item1, $item2) use ($field) {
            return $item2[$field] <=> $item1[$field];
        });
    }
}
