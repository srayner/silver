<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TypeController extends AbstractActionController
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
        
    }
    
    public function indexAction()
    {
        return array(
            'types' => $this->service->findAll()
        );
    }
   
    public function addAction()
    {
        // Create a new form.
        $form = $this->getServiceLocator()->get('Application\Form\Type');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new type object.
            $type = $this->getServiceLocator()->get('Application\Type');
            
            $form->bind($type);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist type.
            	$this->service->persist($type);
                
            	// Redirect to list of types
		return $this->redirect()->toRoute('application/default', array(
		    'controller' => 'type',
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
                 'controller' => 'type',
                 'action' => 'add'
             ));
        }
        
        // Grab the type with the specified id.
        $type = $this->service->findById($id);
        
        $form = $this->getServiceLocator()->get('Application\Form\Type');
        $form->bind($type);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Persist type.
            	$this->service->persist($type);
                
                // Redirect to list of types
                return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'type'
                ));
            }     
        }
        
        return new ViewModel(array(
             'type' => $type,
             'form' => $form,
        ));
        
    }
    
    public function deleteAction()
    {
        // Ensure we have an id, else redirect to index action.
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('application/default', array('controller' => 'type'));
        }
        
        $type = $this->service->findById($id);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Only perform delete if value posted was 'Yes'.
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes') {
                $this->service->remove($type);
            }

            // Redirect to list of types
            return $this->redirect()->toRoute('application/default', array('controller' => 'type'));
         }
         
        return new ViewModel(array(
            'type' => $type
        ));
    }
    
    public function denominationAction()
    {
        $denomination = urldecode($this->params()->fromRoute('id', ''));
        $types = $this->service->findByDenomination($denomination);
        return array(
            'denomination' => $denomination,
            'types' => $types
        );
    }

}

