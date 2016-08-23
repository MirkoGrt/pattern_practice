<?php

namespace lib\Pages;
use lib\mvc as Mvc;
use lib\DbWork;

/**
 * Class Calendar
 */
class Calendar extends Mvc\BaseController {

    public $eventsTableName = 'events';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Adding event to events table
     */
    public function addEvent() {

        /* Getting post data */
        $eventTimestamp = $_POST['timestamp'];
        $eventTitle = $_POST['title'];
        $eventDetails = $_POST['details'];

        // if there is no table for current year - create it
        if (!$this->generalFunctions()->checkIfTableExist($this->eventsTableName)) {
            $this->moCalendarCreate()->createEventsTable($this->eventsTableName);
        }

        $eventInserting = $this->moCalendarInsert()->addEvent($this->eventsTableName, $eventTitle, $eventDetails, $eventTimestamp);

        if ($eventInserting) {
            echo json_encode('Success! Event is added');
        } else {
            echo json_encode("Error with adding the event!");
        }
    }

    /**
     * Function to toggle event status (0/1)
     */
    public function changeEventStatus () {
        
        $eventId = $_POST['id'];

        $eventUpdating = $this->moCalendarInsert()->updateEventStatus($this->eventsTableName, $eventId);

        if ($eventUpdating) {
            echo json_encode('Success! Status is changed');
        } else {
            echo json_encode("Error with changing the status!");
        }
    }

    /**
     * Function to delete event from DB
     */
    public function deleteEvent () {
        
        $eventId = $_POST['id'];

        $eventDeleting = $this->moCalendarDelete()->deleteEvent($this->eventsTableName, $eventId);

        if ($eventDeleting) {
            echo json_encode('Success! Event deleted');
        } else {
            echo json_encode("Error with deleting the event!");
        }
    }

    /**
     * @return array
     *
     * return all events data from the table
     */
    public function getAllEventsData () {
        $allEventsData = $this->moCalendarSelect()->getAllEvents($this->eventsTableName);
        return $allEventsData;
    }

    /**
     * @param $dayTimestamp
     * @return mixed
     *
     * return the array with all events info in current day
     */
    public function getEventData ($dayTimestamp) {
        $allEventsData = $this->getAllEventsData();
        return $allEventsData[$dayTimestamp];
    }

    /**
     * @return array
     * get all timestamp in array to check if current day has events
     */
    public function getAllEventsTimestamp () {
        $allTimestamps = $this->moCalendarSelect()->getTimestamps($this->eventsTableName);
        return $allTimestamps;
    }


    /**
     * Return all calendar page with template.
     */
    public function showCalendar() {
        $result = $this->render('calendar.php', []);
        echo $result;
    }
}