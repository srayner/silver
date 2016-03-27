<?php

namespace Application\Controller;

use Application\Service\Coin as CoinService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new CoinService;
        return new IndexController($service);
    }
}

