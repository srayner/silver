<?php

namespace Application\Form;

class MonarchForm extends HorizontalForm
{
    public function __construct()
    {
        parent::__construct();
        
        $this->addText('name', 'Name')
             ->addText('house', 'House')
             ->addText('birth', 'Birth')
             ->addText('reignStart', 'Reign Start')
             ->addText('reignEnd', 'Reign End')
             ->addText('death', 'Death')
             ->addButton('submit', 'Add', 'btn-primary');
    }
}