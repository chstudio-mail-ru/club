<?php

namespace app\bootstrap;

use app\services\CalculateService;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = \Yii::$container;

        $container->setSingleton(CalculateService::class);
    }
}