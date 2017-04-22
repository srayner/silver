<?php

namespace Application\Form;

use Zend\Stdlib\Hydrator\ClassMethods;
use Application\Hydrator\Strategy\DateTimeStrategy;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MonarchFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new MonarchForm;
        $hydrator = new classMethods(false);
        $dateTimeStrategy = new DateTimeStrategy('d/m/Y');
        $hydrator->addStrategy('birth', $dateTimeStrategy);
        $hydrator->addStrategy('reignStart', $dateTimeStrategy);
        $hydrator->addStrategy('reignEnd', $dateTimeStrategy);
        $hydrator->addStrategy('death', $dateTimeStrategy);
        $form->setHydrator($hydrator);
        $validator = new MonarchValidator();
        $form->setInputFilter($validator);
        return $form;
    }   
}