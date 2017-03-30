<?php

/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 30.03.17
 * Time: 16:00
 */

namespace TopItems\Providers;

use Plenty\Plugin\ServiceProvider;

class TopItemsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(TopItemsRouteServiceProvider::class);
    }
}