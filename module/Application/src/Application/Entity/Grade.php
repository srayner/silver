<?php

namespace Application\Entity;

class Condition
{
    protected $id;
    
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
