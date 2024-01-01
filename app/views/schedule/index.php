<?php
$title = "Schedule List";
ob_start();
?>

<div class="container mt-5">
    <h1>Schedule List</h1>

    <!-- Add a link to create a new schedule -->
    <a href="/schedule/create" class="btn btn-primary mb-3">Add New Schedule</a>

    <?php if (!empty($schedules)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Available Seats</th>
                    <th>Bus</th>
                    <th>Route</th>
                    <th>Company Image</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schedules as $schedule): ?>
                    <tr>
                        <td>
                            <?= $schedule->getScheduleID() ?>
                        </td>
                        <td>
                            <?= $schedule->getDate() ?>
                        </td>
                        <td>
                            <?= $schedule->getDepartureTime() ?>
                        </td>
                        <td>
                            <?= $schedule->getArrivalTime() ?>
                        </td>
                        <td>
                            <?= $schedule->getAvailableSeats() ?>
                        </td>

                        <td>
                            <?= $schedule->getBus()->getBusID() ?>
                        </td>
                        <td>
                            <?= $schedule->getRoute()->getRouteID() ?>
                        </td>
                        <td>

                            <img src=" <?= $schedule->getCompanyImageByID($schedule->getCompanyID()) ?>" alt="">

                        </td>
                        <td>
                            <?= $schedule->getPrice() . "DH" ?>
                        </td>
                        <td>
                            <!-- Add links to edit and delete each schedule -->
                            <a href="/schedule/edit/<?= $schedule->getScheduleID() ?>" class="btn btn-warning">Edit</a>
                            <a href="/schedule/delete/<?= $schedule->getScheduleID() ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No schedules found.</p>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>