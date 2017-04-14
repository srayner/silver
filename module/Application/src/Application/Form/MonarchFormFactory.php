<?php

namespace Application\Form;

use Application\Hydrator\Strategy\DateTimeStrategy;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MonarchFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new MonarchForm;
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $hydrator = new DoctrineHydrator($entityManager);
        $dateTimeStrategy = new DateTimeStrategy('d/m/Y');
        $hydrator->addStrategy('birth', $dateTimeStrategy);
        $hydrator->addStrategy('reignStart', $dateTimeStrategy);
        $hydrator->addStrategy('reignEnd', $dateTimeStrategy);
        $form->setHydrator($hydrator);
        $validator = new MonarchValidator();
        $form->setInputFilter($validator);
        return $form;
    }   
}