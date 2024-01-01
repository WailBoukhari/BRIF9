<?php

class Schedule
{
    private $scheduleID;
    private $date;
    private $departureTime;
    private $arrivalTime;
    private $availableSeats;
    private $bus;
    private $route;
    private $companyID;
    private $price;
    public function __construct($scheduleID, $date, $departureTime, $arrivalTime, $availableSeats, $bus, $route, $companyID, $price)
    {
        $this->scheduleID = $scheduleID;
        $this->date = $date;
        $this->departureTime = $departureTime;
        $this->arrivalTime = $arrivalTime;
        $this->availableSeats = $availableSeats;
        $this->bus = $bus;
        $this->route = $route;
        $this->price = $price;
        $this->companyID = $companyID;
    }

    public function getScheduleID()
    {
        return $this->scheduleID;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    public function getAvailableSeats()
    {
        return $this->availableSeats;
    }

    public function getBusID()
    {
        return $this->bus;
    }

    public function getRouteID()
    {
        return $this->route;
    }

    public function getCompanyID()
    {
        return $this->companyID;
    }
    public function getBus()
    {
        return $this->bus;
    }

    public function getRoute()
    {
        return $this->route;
    }
    public function getCompanyImageByID($companyID)
    {
        $companyDAO = new CompanyDAO();
        $company = $companyDAO->getCompanyById($companyID);

        // Assuming you have a method like getCompanyImage() in your Company class
        return $company ? $company->getCompanyImage() : 'Unknown';
    }
    public function getCompanyImage()
    {
        return $this->getCompanyID() ? $this->getCompanyImageByID($this->getCompanyID()) : 'Unknown';
    }
    public function getPrice()
    {
        return $this->price;
    }


}

?>