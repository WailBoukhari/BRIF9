<?php

include_once 'DatabaseDAO.php';
include_once 'Schedule.php';

class ScheduleDAO extends DatabaseDAO
{
    public function getAllSchedules()
    {
        $query = "SELECT * FROM Schedule";
        $scheduleData = $this->fetchAll($query);

        $schedules = array();
        foreach ($scheduleData as $scheduleRow) {
            $schedules[] = new Schedule(
                $scheduleRow['scheduleID'],
                $scheduleRow['date'],
                $scheduleRow['departureTime'],
                $scheduleRow['arrivalTime'],
                $scheduleRow['availableSeats'],
                $scheduleRow['busID'],
                $scheduleRow['routeID']
            );
        }

        return $schedules;
    }

    public function getScheduleById($scheduleID)
    {
        $query = "SELECT * FROM Schedule WHERE scheduleID = :scheduleID";
        $params = [':scheduleID' => $scheduleID];
        $scheduleData = $this->fetch($query, $params);

        if ($scheduleData) {
            return new Schedule(
                $scheduleData['scheduleID'],
                $scheduleData['date'],
                $scheduleData['departureTime'],
                $scheduleData['arrivalTime'],
                $scheduleData['availableSeats'],
                $scheduleData['busID'],
                $scheduleData['routeID']
            );
        }

        return null; // Return null if schedule with given ID is not found
    }

    public function getSchedulesByCitiesAndDate($departureCityID, $arrivalCityID, $travelDate)
    {
        $sql = 'SELECT s.*
                FROM Schedule s
                INNER JOIN Route r ON s.routeID = r.routeID
                WHERE r.startCityID = :departureCityID
                AND r.endCityID = :arrivalCityID
                AND DATE(s.date) = :travelDate';

        $params = [
            ':departureCityID' => $departureCityID,
            ':arrivalCityID' => $arrivalCityID,
            ':travelDate' => $travelDate
        ];

        $scheduleData = $this->fetchAll($sql, $params);

        $schedules = array();
        foreach ($scheduleData as $scheduleRow) {
            $schedules[] = new Schedule(
                $scheduleRow['scheduleID'],
                $scheduleRow['date'],
                $scheduleRow['departureTime'],
                $scheduleRow['arrivalTime'],
                $scheduleRow['availableSeats'],
                $scheduleRow['busID'],
                $scheduleRow['routeID']
            );
        }

        return $schedules;
    }

    public function addSchedule($schedule)
    {
        $date = $schedule->getDate();
        $departureTime = $schedule->getDepartureTime();
        $arrivalTime = $schedule->getArrivalTime();
        $availableSeats = $schedule->getAvailableSeats();
        $busID = $schedule->getBusID();
        $routeID = $schedule->getRouteID();

        $query = "INSERT INTO Schedule (date, departureTime, arrivalTime, availableSeats, busID, routeID) 
                  VALUES (:date, :departureTime, :arrivalTime, :availableSeats, :busID, :routeID)";
        $params = [
            ':date' => $date,
            ':departureTime' => $departureTime,
            ':arrivalTime' => $arrivalTime,
            ':availableSeats' => $availableSeats,
            ':busID' => $busID,
            ':routeID' => $routeID
        ];

        return $this->execute($query, $params);
    }

    public function updateSchedule($schedule)
    {
        $scheduleID = $schedule->getScheduleID();
        $date = $schedule->getDate();
        $departureTime = $schedule->getDepartureTime();
        $arrivalTime = $schedule->getArrivalTime();
        $availableSeats = $schedule->getAvailableSeats();
        $busID = $schedule->getBusID();
        $routeID = $schedule->getRouteID();

        $query = "UPDATE Schedule 
                  SET date = :date, 
                      departureTime = :departureTime, 
                      arrivalTime = :arrivalTime, 
                      availableSeats = :availableSeats, 
                      busID = :busID, 
                      routeID = :routeID 
                  WHERE scheduleID = :scheduleID";

        $params = [
            ':scheduleID' => $scheduleID,
            ':date' => $date,
            ':departureTime' => $departureTime,
            ':arrivalTime' => $arrivalTime,
            ':availableSeats' => $availableSeats,
            ':busID' => $busID,
            ':routeID' => $routeID
        ];

        return $this->execute($query, $params);
    }

    public function deleteSchedule($scheduleID)
    {
        $query = "DELETE FROM Schedule WHERE scheduleID = :scheduleID";
        $params = [':scheduleID' => $scheduleID];

        return $this->execute($query, $params);
    }
}
