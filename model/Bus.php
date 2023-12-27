<?php

class Bus
{
    public $busID;
    public $busNumber;
    public $licensePlate;
    public $companyID;
    public $capacity;

    public function __construct($busID, $busNumber, $licensePlate, $companyID, $capacity)
    {
        $this->busID = $busID;
        $this->busNumber = $busNumber;
        $this->licensePlate = $licensePlate;
        $this->companyID = $companyID;
        $this->capacity = $capacity;
    }

    function getBusID()
    {
        return $this->busID;
    }
    function getBusNumber()
    {
        return $this->busNumber;
    }
    function getLicensePlate()
    {
        return $this->licensePlate;
    }
    function getCompanyID()
    {
        return $this->companyID;
    }
    function getCapacity()
    {
        return $this->capacity;
    }
}
