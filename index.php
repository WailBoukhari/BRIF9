<?php
$title = 'Home';
// Include necessary files
require_once __DIR__ . '/model/Database.php'; // Adjust the path based on your project structure
require_once __DIR__ . '/controller/BusController.php';
require_once __DIR__ . '/controller/RouteController.php';
require_once __DIR__ . '/controller/ScheduleController.php';
require_once __DIR__ . '/view/include/header.php';
require_once __DIR__ . '/view/include/footer.php';

// Example: Instantiate controllers
$busController = new BusController();
$routeController = new RouteController();
$scheduleController = new ScheduleController();

// Example: Handle routing
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'bus':
        echo $busController->indexBus(); // Update to a specific action method name
        require_once __DIR__ . '\view\busIndex.php';
        break;
    case 'route':
        echo $routeController->indexRout(); // Update to a specific action method name
        require_once __DIR__ . '\view\routeIndex.php';
        break;
    case 'schedule':
        echo $scheduleController->indexSchedule(); // Update to a specific action method name
        require_once __DIR__ . '\view\schedulesIndex.php';
        break;
    default:
        // Your HTML and PHP code for the homepage, including the search form
        require_once __DIR__ . '\view\home.php';

        break;
}
