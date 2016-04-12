<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
  * @ORM\Table(name="grade")
  */
class Grade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $code;
   
    /**
     * @ORM\Column(type="string")
     */
    protected $description;
    
    function getId()
    {
        return $this->id;
    }

    function getCode()
    {
        return $this->code;
    }
    
    function getDescription()
    {
        return $this->description;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
    
    function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
