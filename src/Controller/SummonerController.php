<?php

namespace App\Controller;

use App\Form\SummonerType;
use App\Service\API\LOL\SummonerApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SummonerController extends AbstractController
{
    /**
     * @var SummonerApi
     */
    private $summonerApi;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * SummonerController constructor.
     * @param SummonerApi $summonerApi
     * @param SessionInterface $session
     */
    public function __construct(SummonerApi $summonerApi, SessionInterface $session)
    {
        $this->summonerApi = $summonerApi;
        $this->session = $session;
    }


    /**
     * @Route("/summoner", name="summoner_index")
     * @param SummonerApi $summonerApi
     * @param Request $request
     * @return Response
     */
    public function index(Request $request ): Response
    {
        $form = $this->createForm(SummonerType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $this->session->set('region',$data['region']);
            $this->session->set('name',$data['name']);
            return $this->redirectToRoute("summoner_show",['name'=>$data['name']]);
        }
        return $this->render('summoner/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/summoner/{name}", name="summoner_show")
     */
    public function show()
    {

        $summoner = $this->summonerApi->getSummoner($this->session->get('region'), $this->session->get('name'));
        dd($summoner);
    }
}
