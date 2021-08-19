<?php

namespace App\Controller;

use App\Service\API\LOL\BaseApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @param BaseApi $baseApi
     * @param SessionHandlerInterface $handler
     * @return Response
     */
    public function headerNavbar(BaseApi $baseApi, RequestStack $requestStack)
    {
        $versions = $baseApi->getAllVersion();
        // Mise en Session de la derniere version
        $session = $requestStack->getSession();
        $session->set("version", $versions[0]);
        return $this->render('main/__navbar.html.twig', [
            'versions' => $versions
        ]);
    }
}
