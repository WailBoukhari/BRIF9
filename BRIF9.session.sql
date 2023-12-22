-- Drop the database
DROP DATABASE SmartTravel;
-- Create the database
CREATE DATABASE SmartTravel;
-- Use the database
USE SmartTravel;
-- Table for City
CREATE TABLE City (
    cityID INT PRIMARY KEY,
    cityName VARCHAR(255)
);
-- Table for Company
CREATE TABLE Company (
    companyID INT PRIMARY KEY,
    companyName VARCHAR(255)
);
-- Table for Bus
CREATE TABLE Bus (
    busID INT PRIMARY KEY,
    busNumber INT,
    licensePlate VARCHAR(255),
    companyID INT,
    capacity INT,
    FOREIGN KEY (companyID) REFERENCES Company(companyID)
);
-- Table for Route
CREATE TABLE Route (
    routeID INT PRIMARY KEY,
    startCityID INT,
    endCityID INT,
    distance VARCHAR(255),
    duration TIME,
    FOREIGN KEY (startCityID) REFERENCES City(cityID),
    FOREIGN KEY (endCityID) REFERENCES City(cityID),
    CONSTRAINT CHECKER CHECK (startCityID != endCityID)
);
-- Table for Horaire
CREATE TABLE Schedule (
    scheduleID INT PRIMARY KEY,
    date DATE,
    departureTime DATE,
    arrivalTine DATE,
    availableSeats INT,
    busID INT,
    routeID INT,
    FOREIGN KEY (busID) REFERENCES Bus(busID),
    FOREIGN KEY (routeID) REFERENCES Route(routeID)
);