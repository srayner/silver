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
        return array(
            'coins' => $this->service->findAll()
        );
    }
   
    public function addAction()
    {
        // Create a new form.
        $form = $this->getServiceLocator()->get('Application\Form\Coin');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new coin object.
            $coin = $this->getServiceLocator()->get('Application\Coin');
            
            $form->bind($coin);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist coin.
            	$this->service->persist($coin);
                
            	// Redirect to list of coins
		return $this->redirect()->toRoute('application/default', array(
		    'controller' => 'coin',
                    'action'     => 'index'
		));
            }
        } 
        
        // If not a POST request, or invalid data, then just render the form.
        return new ViewModel(array(
            'form'   => $form
        ));
    }
    
    public function editAction()
    {
        // Ensure we have an id, else redirect to add action.
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
             return $this->redirect()->toRoute('application/default', array(
                 'controller' => 'coin',
                 'action' => 'add'
             ));
        }
        
        // Grab the coin with the specified id.
        $coin = $this->service->findById($id);
        
        $form = $this->getServiceLocator()->get('Application\Form\Coin');
        $form->bind($coin);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Persist coin.
            	$this->service->persist($coin);
                
                // Redirect to list of coins
                return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'coin'
                ));
            }     
        }
        
        return new ViewModel(array(
             'coin' => $coin,
             'form' => $form,
        ));
        
    }
    
    public function deleteAction()
    {
        
    }
    
    private function pretty($str)
    {
        return ucwords(str_replace('-', ' ', $str));
    }
}
