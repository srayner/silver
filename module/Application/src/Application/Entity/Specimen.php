<?php

namespace Application\Entity;

class Specimen extends AbstractEntity
{
    protected $coin;
    protected $condition;
    protected $dateObtained;
    protected $obtainedFrom;
    protected $purchasePrice;
    protected $box;
    protected $tray;
    protected $rowNo;
    protected $columnNo;
    
    function getCoin()
    {
        return $this->coin;
    }

    function getCondition()
    {
        return $this->condition;
    }

    function getDateObtained()
    {
        return $this->dateObtained;
    }

    function getObtainedFrom()
    {
        return $this->obtainedFrom;
    }

    function getPurchasePrice()
    {
        return $this->purchasePrice;
    }

    function getBox()
    {
        return $this->box;
    }

    function getTray()
    {
        return $this->tray;
    }

    function getRowNo()
    {
        return $this->rowNo;
    }

    function getColumnNo()
    {
        return $this->columnNo;
    }

    function setCoin($coin)
    {
        $this->coin = $coin;
    }

    function setCondition($condition)
    {
        $this->condition = $condition;
    }

    function setDateObtained($dateObtained)
    {
        $this->dateObtained = $dateObtained;
    }

    function setObtainedFrom($obtainedFrom)
    {
        $this->obtainedFrom = $obtainedFrom;
    }

    function setPurchasePrice($purchasePrice)
    {
        $this->purchasePrice = $purchasePrice;
    }

    function setBox($box)
    {
        $this->box = $box;
    }

    function setTray($tray)
    {
        $this->tray = $tray;
    }

    function setRowNo($rowNo)
    {
        $this->rowNo = $rowNo;
    }

    function setColumnNo($columnNo)
    {
        $this->columnNo = $columnNo;
    }
}
