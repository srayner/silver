<?php

namespace Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class MonarchForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        
        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Name',
            ),
            'type'  => 'Text',
        ));
        
        $this->add(array(
            'name' => 'house',
            'options' => array(
                'label' => 'House',
            ),
            'type'  => 'Text',
        ));
        
        $this->add(array(
            'name' => 'birth',
            'options' => array(
                'label' => 'Birth',
            ),
            'type'  => 'Text',
        ));
        
        $this->add(array(
            'name' => 'reignStart',
            'options' => array(
                'label' => 'Reign Start',
            ),
            'type'  => 'Text',
        ));
        
        $this->add(array(
            'name' => 'reignEnd',
            'options' => array(
                'label' => 'Reign End',
            ),
            'type'  => 'Text',
        ));
        
        $this->add(array(
            'name' => 'death',
            'options' => array(
                'label' => 'Death',
            ),
            'type'  => 'Text',
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => 'Submit',
            ),
        ));
    }
}