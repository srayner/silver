<?php

namespace Application\Entity;

class Condition extends AbstractEntity
{
    protected $description;
    
    function getDescription()
    {
        return $this->description;
    }

    function setDescription($description)
    {
        $this->description = $description;
    }
}
