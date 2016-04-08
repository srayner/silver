<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CoinController extends AbstractActionController
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
        
    }
    
    public function indexAction()
    {
        $lctype = $this->params()->fromRoute('type');
        $type = $this->pretty($lctype);
        return array(
            'type' => $type,
            'coins' => $this->service->getByType('')
        );
    }
   
    public function addAction()
    {
        
    }
    
    public function editAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }
    
    private function pretty($str)
    {
        return ucwords(str_replace('-', ' ', $str));
    }
}
