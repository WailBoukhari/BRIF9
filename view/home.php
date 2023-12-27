<?php
// Include necessary files
require_once 'model/Database.php';
require_once 'model/cityDAO.php';
require_once 'view/include/header.php';

// Create a Database instance

$Cites = new cityDAO();

?>

<div class="container">
    <h1 class="mt-5">Welcome to SmartTravel!</h1>
    <p>Explore and book your bus trips with ease.</p>


    <!-- Search Form -->
    <h2 class="mt-4">Search for Bus Trips</h2>
    <form action="search.php" method="GET">
        <div class="form-group">
            <label for="departureCity">Departing City:</label>
            <select class="form-control" name="departureCity" id="departureCity">
                <!-- Populate with dynamic data from your database -->
                <?php foreach ($Cites->getAllCities() as $city) : ?>
                    <option value="<?= $selected = $city->getCityID() ?>"><?= $city->getCityName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="arrivalCity">Arrival City:</label>
            <select class="form-control" name="arrivalCity" id="arrivalCity">
                <!-- Populate with dynamic data from your database -->
                <?php foreach ($Cites->getAllCities() as $city) : ?>
                    <option value="<?= $city->getCityID() ?>"><?= $city->getCityName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="travelDate">Travel Date:</label>
            <input type="date" class="form-control" name="travelDate" id="travelDate">
        </div>

        <div class="form-group">
            <label for="numPeople">Number of People:</label>
            <input type="number" class="form-control" name="numPeople" id="numPeople" min="1">
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Add more dynamic content as needed -->
</div>

<?php
// Include footer
require_once 'view/include/footer.php';
?>