<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class GradeController extends AbstractActionController
{
    protected $service;
    
    public function __construct($service)
    {
        $this->service = $service;
        
    }
    
    public function indexAction()
    {
        return array(
            'grades' => $this->service->findAll()
        );
    }
   
    public function addAction()
    {
        // Create a new form.
        $form = $this->getServiceLocator()->get('Application\Form\Grade');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new monarch object.
            $grade = $this->getServiceLocator()->get('Application\Grade');
            
            $form->bind($grade);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist grade.
            	$this->service->persist($grade);
                
            	// Redirect to list of grades
		return $this->redirect()->toRoute('application/default', array(
		    'controller' => 'grade'
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
                 'controller' => 'grade',
                 'action' => 'add'
             ));
        }
        
        // Grab the grade with the specified id.
        $grade = $this->service->findById($id);
        
        $form = $this->getServiceLocator()->get('Application\Form\Grade');
        $form->bind($grade);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Persist grade.
            	$this->service->persist($grade);
                
                // Redirect to list of grades
                return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'grade'
                ));
            }     
        }
        
        return new ViewModel(array(
             'grade' => $grade,
             'form' => $form,
        ));
        
    }
    
    public function deleteAction()
    {
        
        // Ensure we have an id, else redirect to index action.
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('application/default', array('controller' => 'grade'));
        }
        
        $grade = $this->service->findById($id);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Only perform delete if value posted was 'Yes'.
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes') {
                $this->service->remove($grade);
            }

            // Redirect to list of grades
            return $this->redirect()->toRoute('application/default', array('controller' => 'grade'));
         }
         
        return new ViewModel(array(
            'grade' => $grade
        ));
    }

}

