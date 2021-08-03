<?php

namespace App\Controller;

use App\Service\API\LOL\BaseApi;
use App\Service\API\LOL\ChampionApi;
use Psr\Log\LoggerInterface;
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
    public function index(): Response
    {
//        return $this->redirectToRoute('champions_index');
        return $this->render('home/index.html.twig');
    }

    /**
     *
     */
    public function headerNavbar(BaseApi $baseApi)
    {
        $versions = $baseApi->getAllVersion();
        return $this->render( 'main/__navbar.html.twig', [
            'versions' => $versions
        ]);
    }
}
