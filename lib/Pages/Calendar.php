<?php

namespace Pages;
use \mvc as Mvc;
use \DbWork;

/**
 * Class Calendar
 */
class Calendar extends Mvc\BaseController {

    public $eventsTableName = 'events';

    /**
     * @return DbWork\DbConnection
     * function to get DB Connection from DbConnection class
     */
    public function getDataBase () {
        return new DbWork\DbConnection('root', 'root', 'practice_calendar');
    }

    /**
     * Adding event to events table
     */
    public function addEvent() {
        $PDO_Connection = $this->getDataBase()->initDbConnection();
        $moCalendarCreate = new DbWork\MoCalendar\CreateTables($PDO_Connection);
        $DbGeneralFunctions = new DbWork\GeneralFunctions($PDO_Connection);
        $moCalendarInsert = new DbWork\MoCalendar\InsertData($PDO_Connection);

        /* Getting post data */
        $eventTimestamp = $_POST['timestamp'];
        $eventTitle = $_POST['title'];
        $eventDetails = $_POST['details'];

        // if there is no table for current year - create it
        if (!$DbGeneralFunctions->checkIfTableExist($this->eventsTableName)) {
            $moCalendarCreate->createEventsTable($this->eventsTableName);
        }

        $eventInserting = $moCalendarInsert->addEvent($eventTitle, $eventDetails, $eventTimestamp);

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
        $PDO_Connection = $this->getDataBase()->initDbConnection();
        $moCalendarInsert = new DbWork\MoCalendar\InsertData($PDO_Connection);
        
        $eventId = $_POST['id'];

        $eventUpdating = $moCalendarInsert->updateEventStatus($eventId);

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
        $PDO_Connection = $this->getDataBase()->initDbConnection();
        $moCalendarDelete = new DbWork\MoCalendar\DeleteData($PDO_Connection);
        
        $eventId = $_POST['id'];

        $eventDeleting = $moCalendarDelete->deleteEvent($eventId);

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
        $PDO_Connection = $this->getDataBase()->initDbConnection();
        $moCalendarSelect = new DbWork\MoCalendar\SelectData($PDO_Connection);

        $allEventsData = $moCalendarSelect->getAllEvents();

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
        $PDO_Connection = $this->getDataBase()->initDbConnection();
        $moCalendarSelect = new DbWork\MoCalendar\SelectData($PDO_Connection);

        $allTimestamps = $moCalendarSelect->getTimestamps();

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