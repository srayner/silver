<?php

namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
  * @ORM\Table(name="coin")
  */
class Coin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    protected $type;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $year;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $mintage;
    
    /**
     * @ORM\Column(type="string", name="obverse_image")
     */
    protected $obverseImage;
    
    /**
     * @ORM\Column(type="string", name="obverse_design")
     */
    protected $obverseDesign;
    
    /**
     * @ORM\Column(type="string", name="obverse_designer")
     */
    protected $obverseDesigner;
    
    /**
     * @ORM\Column(type="string", name="reverse_image")
     */
    protected $reverseImage;
    
    /**
     * @ORM\Column(type="string", name="reverse_design")
     */
    protected $reverseDesign;
    
    /**
     * @ORM\Column(type="string", name="reverse_designer")
     */
    protected $reverseDesigner;
    
    function getId()
    {
        return $this->id;
    }
    
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

    function getObverseImage()
    {
        return $this->obverseImage;
    }
    
    function getObverseDesign()
    {
        return $this->obverseDesign;
    }

    function getObverseDesigner()
    {
        return $this->obverseDesigner;
    }

    function getReverseImage()
    {
        return $this->reverseImage;
    }
    
    function getReverseDesign()
    {
        return $this->reverseDesign;
    }

    function getReverseDesigner()
    {
        return $this->reverseDesigner;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
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

    function setObverseImage($obverseImage)
    {
        $this->obverseImage = $obverseImage;
    }
    
    function setObverseDesign($obverseDesign)
    {
        $this->obverseDesign = $obverseDesign;
    }

    function setObverseDesigner($obverseDesigner)
    {
        $this->obverseDesigner = $obverseDesigner;
    }

    function setReverseImage($reverseImage)
    {
        $this->reverseImage = $reverseImage;
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
