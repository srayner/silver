<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;

class CoinFilter extends InputFilter
{
    public function __construct()
    {
        // mintage
        $this->add(array(
            'name'       => 'mintage',
            'required'   => false,
            'filters'   => array(
                array('name' => 'StringTrim'),
                array('name' => 'ToNull'),
            ),
        ));
    }
}