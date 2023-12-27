<?php

// Assuming you have received parameters from the URL
$departureCity = isset($_GET['departureCity']) ? $_GET['departureCity'] : null;
$arrivalCity = isset($_GET['arrivalCity']) ? $_GET['arrivalCity'] : null;
$travelDate = isset($_GET['travelDate']) ? $_GET['travelDate'] : null;
$numPeople = isset($_GET['numPeople']) ? $_GET['numPeople'] : null;

// Validate and sanitize the input data if needed

// Now, you can use these parameters to perform the search
if ($departureCity !== null && $arrivalCity !== null && $travelDate !== null) {
    // Assuming you have an instance of ScheduleDAO
    $scheduleDAO = new ScheduleDAO();

    // Perform the search using getSchedulesByCitiesAndDate
    $schedules = $scheduleDAO->getSchedulesByCitiesAndDate($departureCity, $arrivalCity, $travelDate);

    // Display the search results or handle them as needed
    if (!empty($schedules)) {
        foreach ($schedules as $schedule) {
            // Display or process each schedule
            // Example: echo $schedule['scheduleID'];
        }
    } else {
        echo "No schedules found for the specified criteria.";
    }
} else {
    echo "Invalid or incomplete search parameters.";
}
