<?php

namespace Application\Entity;

class Type extends AbstractEntity
{
    protected $monarch;
    protected $denomination;
    protected $metal;
    protected $diameter;
    protected $weight;
    
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