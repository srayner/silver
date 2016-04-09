<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MonarchController extends AbstractActionController
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
        
    }
    
    public function indexAction()
    {
        return array(
            'monarchs' => $this->service->findAll()
        );
    }
   
    public function addAction()
    {
        $form = $this->serviceLocator->get('Application\MonarchForm');
        return new ViewModel(array(
           'form' => $form 
        ));
    }
    
    public function editAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }

}

