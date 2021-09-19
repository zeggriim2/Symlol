<?php

namespace App\Controller;

use App\Service\API\LOL\ItemApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    /**
     * @var ItemApi
     */
    private $itemApi;

    /**
     * ItemController constructor.
     * @param ItemApi $itemApi
     * @return
     */
    public function __construct(ItemApi $itemApi)
    {
        $this->itemApi = $itemApi;
    }


    /**
     * @Route("/item", name="item_index")
     * @return Response
     */
    public function index(): Response
    {
        $items = $this->itemApi->getAllItem();
        $nameItems = [];
        foreach ($items['data'] as $item) {
            $nameItems[] = $item['name'];
        }

        return $this->render('item/index.html.twig', [
            'items'     => $items,
            'nameItems' => $nameItems
        ]);
    }
}
