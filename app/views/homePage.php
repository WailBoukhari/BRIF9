<?php
$title = "Home Page";
ob_start();
?>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="booking-form">
                    <form action="index.php?action=searchPage" method="POST">
                        <div class="row no-margin">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="departureCity">Departing City:</label>
                                    <select class="form-control" name="departureCity" id="departureCity">
                                        <!-- Populate with dynamic data from your database -->
                                        <?php foreach ($Cites->getAllCities() as $city): ?>
                                            <option value="<?= $city->getCityID() ?>">
                                                <?= $city->getCityName() . $city->getCityID() ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="arrivalCity">Arrival City:</label>
                                    <select class="form-control" name="arrivalCity" id="arrivalCity">
                                        <!-- Populate with dynamic data from your database -->
                                        <?php foreach ($Cites->getAllCities() as $city): ?>
                                            <option value="<?= $city->getCityID() ?>">
                                                <?= $city->getCityName() . $city->getCityID() ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="travelDate">Travel Date:</label>
                                    <input type="date" class="form-control" name="travelDate" id="travelDate">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="numPeople">Number of People:</label>
                                    <input type="number" class="form-control" name="numPeople" id="numPeople" min="1">
                                </div>
                            </div>
                            <div class="col-md-2 text-center ">
                                <div class="form-btn">
                                    <button type="submit" class="search_btn">Search Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>