<?php

class Company
{
    private $companyID;
    private $companyName;

    // Constructor
    public function __construct($companyID, $companyName)
    {
        $this->companyID = $companyID;
        $this->companyName = $companyName;
    }

    // Getter methods
    public function getCompanyID()
    {
        return $this->companyID;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }

    // Setter methods (if needed)
    public function setCompanyID($companyID)
    {
        $this->companyID = $companyID;
    }

    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    // Additional methods as needed for your application
}
