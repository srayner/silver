<?php

namespace Application\Controller;

use Application\Service\Monarch as MonarchService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MonarchControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new MonarchService;
        return new MonarchController($service);
    }
}