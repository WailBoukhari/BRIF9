<?php


include_once 'DatabaseDAO.php';
include_once 'Bus.php';

class BusDAO extends DatabaseDAO
{
    public function getAllBuses()
    {
        $query = "SELECT * FROM Bus";
        $buses = array();
        $result = $this->fetchAll($query);
        foreach ($result as $row) {
            $buses[] = new Bus($row['busID'], $row['busNumber'], $row['licensePlate'], $row['companyID'], $row['capacity']);
        }
        return $buses;
    }
}
