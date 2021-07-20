<?php

namespace App\Controller;

use App\Service\API\LOL\ChampionApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param ChampionApi $championApi
     * @return Response
     */
    public function index(ChampionApi $championApi): Response
    {
//        return $this->redirectToRoute('champions_index');
        return $this->render('home/index.html.twig');
    }
}
