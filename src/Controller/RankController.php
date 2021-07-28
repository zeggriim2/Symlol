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
     */
    public function __construct(RequestStack $requestStack, RankApi $rankApi)
    {
        $this->requestStack = $requestStack;
        $this->rankApi = $rankApi;
    }


    /**
     * @Route("/rank", name="rank_index")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(RankType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $keyData = array_keys($data);
            $this->requestStack->getSession()->set($keyData[0], $data['queue']);
            $this->requestStack->getSession()->set($keyData[1], $data['platform']);
            return $this->redirectToRoute("rank_ladder");
        }

        return $this->render('rank/index.html.twig', [
            'formRank' => $form->createView(),
        ]);
    }

    /**
     *
     * @Route("/rank/ladder", name="rank_ladder")
     */
    public function ladder(): Response
    {
        $queue = $this->requestStack->getSession()->get('queue');
        $platform = $this->requestStack->getSession()->get('platform');

        $ladderChallengers = $this->rankApi->getChallenger($platform, $queue)['entries'];

        $this->descendingSort($ladderChallengers, 'leaguePoints');

        return $this->render('rank/ladder.html.twig', [
            'ladderChallengers' => $ladderChallengers
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
