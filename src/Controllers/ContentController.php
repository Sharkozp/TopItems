<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 30.03.17
 * Time: 16:02
 */

namespace TopItems\Controllers;

use Plenty\Modules\Item\DataLayer\Contracts\ItemDataLayerRepositoryContract;
use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;

class ContentController extends Controller
{
    public function showTopItems(Twig $twig, ItemDataLayerRepositoryContract $itemRepository): string
    {
        $itemColumns = [
            'itemDescription' => [
                'name1',
                'description'
            ],
            'variationBase' => [
                'id'
            ],
            'variationRetailPrice' => [
                'price'
            ],
            'variationImageList' => [
                'path',
                'cleanImageName'
            ]
        ];

        $itemFilter = [
            'itemBase.isStoreSpecial' => [
                'shopAction' => [3]
            ]
        ];

        $itemParams = [
            'language' => 'en'
        ];

        $resultItems = $itemRepository->search($itemColumns, $itemFilter, $itemParams);

        $items = array();
        foreach ($resultItems as $item) {
            $items[] = $item;
        }
        $templateData = array(
            'resultCount' => $resultItems->count(),
            'currentItems' => $items
        );

        return $twig->render('TopItems::content.TopItems', $templateData);
    }
}