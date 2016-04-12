<?php

namespace Application\Form;

class GradeForm extends HorizontalForm
{
    public function __construct()
    {
        parent::__construct();
        
        $this->addText('code', 'Code')
             ->addText('description', 'Description')
             ->addButton('submit', 'Add', 'btn-primary');
    }
}