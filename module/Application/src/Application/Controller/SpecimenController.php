<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SpecimenController extends AbstractActionController
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
        
    }
    
    public function indexAction()
    {
        return array(
            'specimens' => $this->service->findAll()
        );
    }
   
    public function addAction()
    {
        // Create a new form.
        $form = $this->getServiceLocator()->get('Application\Form\Specimen');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new specimen object.
            $specimen = $this->getServiceLocator()->get('Application\Specimen');
            
            $form->bind($specimen);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist specimen.
            	$this->service->persist($specimen);
                
            	// Redirect to list of specimens
		return $this->redirect()->toRoute('application/default', array(
		    'controller' => 'specimen',
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
                 'controller' => 'specimen',
                 'action' => 'add'
             ));
        }
        
        // Grab the specimen with the specified id.
        $specimen = $this->service->findById($id);
        
        $form = $this->getServiceLocator()->get('Application\Form\Monarch');
        $form->bind($specimen);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Persist specimen.
            	$this->service->persist($specimen);
                
                // Redirect to list of specimens
                return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'specimen'
                ));
            }     
        }
        
        return new ViewModel(array(
             'specimen' => $specimen,
             'form' => $form,
        ));
        
    }
    
    public function deleteAction()
    {
        
    }

}
