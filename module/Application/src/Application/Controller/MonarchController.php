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
        // Create a new form.
        $form = $this->getServiceLocator()->get('Application\Form\Monarch');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new monarch object.
            $monarch = $this->getServiceLocator()->get('Application\Monarch');
            
            $form->bind($monarch);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist monarch.
            	$this->service->persist($monarch);
                
            	// Redirect to list of monarchs
		return $this->redirect()->toRoute('application/default', array(
		    'controller' => 'monarch',
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
                 'controller' => 'monarch',
                 'action' => 'add'
             ));
        }
        
        // Grab the monarch with the specified id.
        $monarch = $this->service->findById($id);
        
        $form = $this->getServiceLocator()->get('Application\Form\Monarch');
        $form->bind($monarch);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Persist monarch.
            	$this->service->persist($monarch);
                
                // Redirect to list of monarchs
                return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'monarch'
                ));
            }     
        }
        
        return new ViewModel(array(
             'monarch' => $monarch,
             'form' => $form,
        ));
        
    }
    
    public function deleteAction()
    {
        // Ensure we have an id, else redirect to index action.
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('application/default', array('controller' => 'monarch'));
        }
        
        $monarch = $this->service->findById($id);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Only perform delete if value posted was 'Yes'.
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes') {
                $this->service->remove($monarch);
            }

            // Redirect to list of coins
            return $this->redirect()->toRoute('application/default', array('controller' => 'monarch'));
         }
         
        return new ViewModel(array(
            'monarch' => $monarch
        ));
        
    }

}

