<?php

namespace Application\Form;

class MonarchForm extends HorizontalForm
{
    public function __construct()
    {
        parent::__construct();
        
        $this->addText('year', 'Year')
             ->addText('mintage', 'Mintage')
             ->addText('obverseDesign', 'Obverse Design')
             ->addText('obverseDesigner', 'Obverse Designer')
             ->addText('reverseDesign', 'Reverse Design')
             ->addText('reverseDesigner', 'Reverse Designer')
             ->addButton('submit', 'Add', 'btn-primary');
    }
}