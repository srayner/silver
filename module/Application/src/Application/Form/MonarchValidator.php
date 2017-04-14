<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;

class MonarchValidator extends InputFilter
{
    public function __construct()
    {
        $this->addDateValidator('birth');
        $this->addDateValidator('reignStart');
        $this->addDateValidator('reignEnd', false);
    }
    
    protected function addDateValidator($field, $required = true)
    {
        $this->add(array(
            'name'       => $field,
            'required'   => $required,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\Date',
                    'options' => array(
                        'format' => 'd/m/Y'
                    ),
                ),
            ),
        ));
    }
}
