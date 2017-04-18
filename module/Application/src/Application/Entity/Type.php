<?php

namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
    
    /**
     * @ORM\OneToMany(targetEntity="coin", mappedBy="type", cascade={"persist"})
     * @ORM\OrderBy({"year" = "ASC"})
     */
    protected $coins;
    
    public function __construct()
    {
        $this->coins = new ArrayCollection();
    }
    
    public function getCoins()
    {
        return $this->coins->toArray();
    }
    
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