<?php

namespace App\Controller;

use App\Form\SummonerType;
use App\Service\API\LOL\SummonerApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SummonerController extends AbstractController
{
    /**
     * @Route("/summoner", name="summoner_index")
     * @param SummonerApi $summonerApi
     * @param Request $request
     * @return Response
     */
    public function index(SummonerApi $summonerApi, Request $request): Response
    {
        $form = $this->createForm(SummonerType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();;
            $summonerApi->getSummoner($data['region'], $data['name']);
        }
        return $this->render('summoner/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/summoner/{name}", name="summoner")
     */
    public function show()
    {

    }
}
