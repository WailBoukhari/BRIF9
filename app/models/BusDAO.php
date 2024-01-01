<?php


include_once 'DatabaseDAO.php';
include_once 'Bus.php';
include_once 'CompanyDAO.php';

class BusDAO extends DatabaseDAO
{
    public function getAllBuses()
    {
        $query = "SELECT * FROM Bus";
        $buses = array();
        $result = $this->fetchAll($query);
        foreach ($result as $row) {
            $CompanyDao = new CompanyDao();
            $company = $CompanyDao->getCompanyById($row['companyID']);

            $buses[] = new Bus($row['busID'], $row['busNumber'], $row['licensePlate'], $company, $row['capacity']);

        }
        return $buses;
    }

    public function getBusById($busID)
    {
        $query = "SELECT * FROM Bus WHERE busID = :busID";
        $params = [':busID' => $busID];
        $result = $this->fetch($query, $params);
        $CompanyDao = new CompanyDao();
        $company = $CompanyDao->getCompanyById($result['companyID']);
        return new Bus($result['busID'], $result['busNumber'], $result['licensePlate'], $company, $result['capacity']);
    }

    public function addBus($bus)
    {
        $busID = $bus->getBusID();
        $busNumber = $bus->getBusNumber();
        $licensePlate = $bus->getLicensePlate();
        $companyID = $bus->getCompanyID();
        $capacity = $bus->getCapacity();

        $query = "INSERT INTO Bus (busID, busNumber, licensePlate, companyID, capacity) 
                  VALUES (:busID, :busNumber, :licensePlate, :companyID, :capacity)";
        $params = [
            ':busID' => $busID,
            ':busNumber' => $busNumber,
            ':licensePlate' => $licensePlate,
            ':companyID' => $companyID,
            ':capacity' => $capacity
        ];

        $this->execute($query, $params);
    }

    public function updateBus($bus)
    {
        $busID = $bus->getBusID();
        $busNumber = $bus->getBusNumber();
        $licensePlate = $bus->getLicensePlate();
        $companyID = $bus->getCompany()->getCompanyID(); // Corrected this line
        $capacity = $bus->getCapacity();

        $query = "UPDATE Bus SET busNumber = :busNumber, licensePlate = :licensePlate, 
                  companyID = :companyID, capacity = :capacity 
                  WHERE busID = :busID";
        $params = [
            ':busID' => $busID,
            ':busNumber' => $busNumber,
            ':licensePlate' => $licensePlate,
            ':companyID' => $companyID,
            ':capacity' => $capacity
        ];

        $this->execute($query, $params);
    }


    public function deleteBus($busID)
    {
        $query = "DELETE FROM Bus WHERE busID = :busID";
        $params = [':busID' => $busID];

        return $this->execute($query, $params);
    }
}