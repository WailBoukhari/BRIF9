<?php

class ScheduleController
{
    private $scheduleDAO;

    public function __construct()
    {
        $this->scheduleDAO = new ScheduleDAO();
    }

    public function index()
    {
        // Retrieve all schedules
        $schedules = $this->scheduleDAO->getAllSchedules();

        // Pass the data to the view (you may have a specific view for listing schedules)
        include_once 'app/views/schedule/index.php';
    }

    public function show($scheduleID)
    {
        // Retrieve a specific schedule by ID
        $schedule = $this->scheduleDAO->getScheduleById($scheduleID);

        // Pass the data to the view (you may have a specific view for displaying a single schedule)
        include_once 'app/views/schedule/show.php';
    }

    public function create()
    {
        // Display the form for creating a new schedule
        include_once 'app/views/schedule/create.php';
    }

    public function store()
    {
        // Handle the form submission to store a new schedule in the database
        // This involves creating a new Schedule object and passing it to the addSchedule method in ScheduleDAO
        // Redirect to the index page or show the newly created schedule
    }

    public function edit($scheduleID)
    {
        // Retrieve a specific schedule by ID to populate the edit form
        $schedule = $this->scheduleDAO->getScheduleById($scheduleID);

        // Display the form for editing the schedule
        include_once 'app/views/schedule/edit.php';
    }

    public function update($scheduleID)
    {
        // Handle the form submission to update an existing schedule in the database
        // This involves retrieving the existing schedule, updating its properties, and passing it to the updateSchedule method in ScheduleDAO
        // Redirect to the index page or show the updated schedule
    }

    public function destroy($scheduleID)
    {
        // Delete a schedule by ID
        $this->scheduleDAO->deleteSchedule($scheduleID);

        // Redirect to the index page or show a success message
    }
}