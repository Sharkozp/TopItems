<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 30.03.17
 * Time: 16:01
 */

namespace TopItems\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class TopItemsRouteServiceProvider extends RouteServiceProvider
{
    public function map(Router $router)
    {
        $router->get('topitems', 'TopItems\Controllers\ContentController@showTopItems');
    }
}