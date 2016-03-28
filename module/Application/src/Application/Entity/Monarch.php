<?php

namespace Application\Entity;

class Monarch extends AbstractEntity
{
    protected $name;
    protected $house;
    protected $birth;
    protected $reignStart;
    protected $reignEnd;
    protected $death;
    
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
