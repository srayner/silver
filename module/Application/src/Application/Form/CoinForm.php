<?php

namespace Application\Form;

class CoinForm extends HorizontalForm
{
    public function __construct($em)
    {
        parent::__construct();
        
        $this->addDoctrineSelect('type', 'Coin Type', $em, 'Application\Entity\Type', 'denomination')
             ->addText('year', 'Year')
             ->addText('mintage', 'Mintage')
             ->addText('obverseImage', 'Obverse Image')
             ->addText('obverseDesign', 'Obverse Design')
             ->addText('obverseDesigner', 'Obverse Designer')
             ->addText('reverseImage', 'Reverse Image')
             ->addText('reverseDesign', 'Reverse Design')
             ->addText('reverseDesigner', 'Reverse Designer')
             ->addButton('submit', 'Add', 'btn-primary');
    }
}