<?php

include_once 'DatabaseDAO.php';
include_once 'Route.php';
class RouteDAO extends DatabaseDAO

{
    public function getAllRoutes()
    {
        $query = "SELECT * FROM Route";
        $routeData = $this->fetchAll($query);

        $routes = array();
        foreach ($routeData as $routeRow) {
            $routes[] = new Route(
                $routeRow['routeID'],
                $routeRow['startCityID'],
                $routeRow['endCityID'],
                $routeRow['distance'],
                $routeRow['duration']
            );
        }

        return $routes;
    }

    public function getRouteById($routeID)
    {
        $query = "SELECT * FROM Route WHERE routeID = :routeID";
        $params = [':routeID' => $routeID];
        $routeData = $this->fetch($query, $params);

        if ($routeData) {
            return new Route(
                $routeData['routeID'],
                $routeData['startCityID'],
                $routeData['endCityID'],
                $routeData['distance'],
                $routeData['duration']
            );
        }

        return null; // Return null if route with given ID is not found
    }

    public function addRoute($route)
    {
        $startCityID = $route->getStartCityID();
        $endCityID = $route->getEndCityID();
        $distance = $route->getDistance();
        $duration = $route->getDuration();

        $query = "INSERT INTO Route (startCityID, endCityID, distance, duration) 
                  VALUES (:startCityID, :endCityID, :distance, :duration)";
        $params = [
            ':startCityID' => $startCityID,
            ':endCityID' => $endCityID,
            ':distance' => $distance,
            ':duration' => $duration
        ];

        return $this->execute($query, $params);
    }

    public function updateRoute($route)
    {
        $routeID = $route->getRouteID();
        $startCityID = $route->getStartCityID();
        $endCityID = $route->getEndCityID();
        $distance = $route->getDistance();
        $duration = $route->getDuration();

        $query = "UPDATE Route SET startCityID = :startCityID, endCityID = :endCityID, 
                  distance = :distance, duration = :duration 
                  WHERE routeID = :routeID";
        $params = [
            ':routeID' => $routeID,
            ':startCityID' => $startCityID,
            ':endCityID' => $endCityID,
            ':distance' => $distance,
            ':duration' => $duration
        ];

        return $this->execute($query, $params);
    }

    public function deleteRoute($routeID)
    {
        $query = "DELETE FROM Route WHERE routeID = :routeID";
        $params = [':routeID' => $routeID];

        return $this->execute($query, $params);
    }
}