<?php

namespace App\Controller;

use App\Form\RankType;
use App\Service\API\LOL\RankApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class RankController extends AbstractController
{
    /**
     * @var SessionInterface 
     */
    private $session;

    /**
     * @var RankApi
     */
    private $rankApi;

    /**
     * RankController constructor.
     */
    public function __construct(SessionInterface $session, RankApi $rankApi)
    {
        $this->session = $session;
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
            $this->session->set($keyData[0], $data['queue']);
            $this->session->set($keyData[1], $data['platform']);
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
        $queue = $this->session->get('queue');
        $platform = $this->session->get('platform');

        $ladderChallengers = $this->rankApi->getChallenger($platform, $queue)['entries'];

        $this->trieDescendant($ladderChallengers, 'leaguePoints');

        return $this->render('rank/ladder.html.twig', [
            'ladderChallengers' => $ladderChallengers
        ]);
    }

    private function trieAscendant(array &$data, string $field)
    {
        usort($data, function ($item1, $item2) use ($field) {
            return $item1[$field] <=> $item2[$field];
        });
    }

    private function trieDescendant(array &$data, string $field)
    {
        usort($data, function ($item1, $item2) use ($field) {
            return $item2[$field] <=> $item1[$field];
        });
    }
}
