<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
        
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }
   
    public function listAction()
    {
        $type = $this->params()->fromRoute('type');
        
        $coins = $this->service->getByType($type);
        
        return array(
            'type' => $type,
            'coins' => $coins
        );
    }
}
