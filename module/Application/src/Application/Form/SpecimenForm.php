<?php

namespace Application\Form;

class SpecimenForm extends HorizontalForm
{
    public function __construct()
    {
        parent::__construct();
        
        $this->addText('dateObtained', 'Date Obtained')
             ->addText('obtainedFrom', 'Obtained From')
             ->addText('purchasePrice', 'Purchase Price')
             ->addText('box', 'Date Obtained')
             ->addText('tray', 'Tray')
             ->addText('rowNo', 'Row No')
             ->addText('columnNo', 'Column No')
             ->addButton('submit', 'Add', 'btn-primary');
    }
}