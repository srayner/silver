<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
  * @ORM\Table(name="monarch")
  */
class Monarch
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
    protected $name;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $house;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $birth;
    
    /**
     * @ORM\Column(type="date", name="reign_start")
     */
    protected $reignStart;
    
    /**
     * @ORM\Column(type="date", name="reign_end")
     */
    protected $reignEnd;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $death;
    
    function getId()
    {
        return $this->id;
    }
    
    function getName()
    {
        return $this->name;
    }

    function getHouse()
    {
        return $this->house;
    }

    function getBirth()
    {
        return $this->birth;
    }

    function getReignStart()
    {
        return $this->reignStart;
    }

    function getReignEnd()
    {
        return $this->reignEnd;
    }

    function getDeath()
    {
        return $this->death;    
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    function setName($name)
    {
        $this->name = $name;
    }

    function setHouse($house)
    {
        $this->house = $house;
    }

    function setBirth($birth)
    {
        $this->birth = $birth;
    }

    function setReignStart($reignStart)
    {
        $this->reignStart = $reignStart;
    }

    function setReignEnd($reignEnd)
    {
        $this->reignEnd = $reignEnd;
    }

    function setDeath($death)
    {
        $this->death = $death;
    }
}
