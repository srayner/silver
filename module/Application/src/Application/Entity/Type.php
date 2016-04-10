<?php

namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
  * @ORM\Table(name="type")
  */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Monarch")
     * @ORM\JoinColumn(name="monarch_id", referencedColumnName="id")
     */
    protected $monarch;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $denomination;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $metal;
    
    /**
     * @ORM\Column(type="decimal")
     */
    protected $diameter;
    
    /**
     * @ORM\Column(type="decimal")
     */
    protected $weight;
    
    function getId()
    {
        return $this->id;
    }
    
    function getMonarch()
    {
        return $this->monarch;
    }

    function getDenomination()
    {
        return $this->denomination;
    }

    function getMetal()
    {
        return $this->metal;
    }

    function getDiameter()
    {
        return $this->diameter;
    }

    function getWeight()
    {
        return $this->weight;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    function setMonarch($monarch)
    {
        $this->monarch = $monarch;
    }

    function setDenomination($denomination)
    {
        $this->denomination = $denomination;
    }

    function setMetal($metal)
    {
        $this->metal = $metal;
    }

    function setDiameter($diameter)
    {
        $this->diameter = $diameter;
    }

    function setWeight($weight)
    {
        $this->weight = $weight;
    }
}