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
     */
    public function __construct(ItemApi $itemApi)
    {
        $this->itemApi = $itemApi;
    }


    /**
     * @Route("/item", name="item_index")
     */
    public function index(): Response
    {
        $items = $this->itemApi->getAllItem();
        $nameItems = [];
        foreach ($items['data'] as $item) {
//            $nameItems[] = ['name'  => $item['name']];
            $nameItems[] = $item['name'];
        }
//        $nameItems = json_encode($nameItems, JSON_UNESCAPED_UNICODE );
        return $this->render('item/index.html.twig', [
            'items'     => $items,
            'nameItems' => $nameItems
        ]);
    }
}
