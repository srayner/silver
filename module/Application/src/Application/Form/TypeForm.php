<?php

namespace Application\Form;

class TypeForm extends HorizontalForm
{
    public function __construct($em)
    {
        parent::__construct();
        
        $this->addDoctrineSelect('monarch', 'Monarch', $em, 'Application\Entity\Monarch', 'name')
             ->addText('denomination', 'Demonination')
             ->addText('metal', 'Metal')
             ->addText('diameter', 'Diameter')
             ->addText('weight', 'Weight')
             ->addButton('submit', 'Add', 'btn-primary');
    }
}