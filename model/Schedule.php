<?php

class Schedule
{
    private $scheduleID;
    private $date;
    private $departureTime;
    private $arrivalTime;
    private $availableSeats;
    private $busID;
    private $routeID;

    public function __construct($scheduleID, $date, $departureTime, $arrivalTime, $availableSeats, $busID, $routeID)
    {
        $this->scheduleID = $scheduleID;
        $this->date = $date;
        $this->departureTime = $departureTime;
        $this->arrivalTime = $arrivalTime;
        $this->availableSeats = $availableSeats;
        $this->busID = $busID;
        $this->routeID = $routeID;
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
        return $this->busID;
    }

    public function getRouteID()
    {
        return $this->routeID;
    }

    // Add setters if needed
}
