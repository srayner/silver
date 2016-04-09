<?php

namespace Application\Entity;

class Coin
{
    protected $id;
    protected $type;
    protected $year;
    protected $mintage;
    protected $obverseDesign;
    protected $obverseDesigner;
    protected $reverseDesign;
    protected $reverseDesigner;
    
    function getType()
    {
        return $this->type;
    }

    function getYear()
    {
        return $this->year;
    }

    function getMintage()
    {
        return $this->mintage;
    }

    function getObverseDesign()
    {
        return $this->obverseDesign;
    }

    function getObverseDesigner()
    {
        return $this->obverseDesigner;
    }

    function getReverseDesign()
    {
        return $this->reverseDesign;
    }

    function getReverseDesigner()
    {
        return $this->reverseDesigner;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function setYear($year)
    {
        $this->year = $year;
    }

    function setMintage($mintage)
    {
        $this->mintage = $mintage;
    }

    function setObverseDesign($obverseDesign)
    {
        $this->obverseDesign = $obverseDesign;
    }

    function setObverseDesigner($obverseDesigner)
    {
        $this->obverseDesigner = $obverseDesigner;
    }

    function setReverseDesign($reverseDesign)
    {
        $this->reverseDesign = $reverseDesign;
    }

    function setReverseDesigner($reverseDesigner)
    {
        $this->reverseDesigner = $reverseDesigner;
    }
}
