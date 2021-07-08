<?php

namespace App\Controller;

use App\Service\API\LOL\ApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient($_ENV['APIKEY']);
    }


    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $champions = $this->apiClient->championApi()->GetAllChampion();
        dd($champions);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
