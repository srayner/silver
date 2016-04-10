<?php

namespace Application\Form;

class TypeForm extends HorizontalForm
{
    public function __construct()
    {
        parent::__construct();
        
        $this->addText('denomination', 'Demonination')
             ->addText('metal', 'Metal')
             ->addText('diameter', 'Diameter')
             ->addText('weight', 'Weight')
             ->addButton('submit', 'Add', 'btn-primary');
    }
}