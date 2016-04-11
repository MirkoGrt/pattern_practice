<?php

namespace Pages;
use \mvc as Mvc;

/**
 * Class Calendar
 */
class Calendar extends Mvc\BaseController {

    /**
     * @return \PDO
     */
    public function initDbConnection () {
        $userName = 'root';
        $password = 'root';

        $calendar_connection = new \PDO('mysql:host=localhost; dbname=practice_calendar; charset=utf8mb4', $userName, $password);

        $calendar_connection or die('ERROR with connection to MYSQL server . . .<hr />');

        return $calendar_connection;
    }

    /**
     * Adding event to events table
     */
    public function addEvent() {
        $PDO_Connection = $this->initDbConnection();

        /* Getting post data */
        $eventTimestamp = $_POST['timestamp'];
        $eventTitle = $_POST['title'];
        $eventDetails = $_POST['details'];

        /* MySQL insert query. PDO prepared query */
        $insertQuery = $PDO_Connection->prepare(
            'INSERT INTO events (title, detail, eventDate, dateAdded)
                VALUES (:eventTitle, :eventDetails, :eventTimestamp, NOW())'
        );

        /* Binding params */
        $insertQuery->bindParam(':eventTitle', $eventTitle);
        $insertQuery->bindParam(':eventDetails', $eventDetails);
        $insertQuery->bindParam(':eventTimestamp', $eventTimestamp);


        /* Running and checking the query */
        if ($insertQuery->execute()) {
            echo json_encode('Success! Event is added');
        } else {
            echo json_encode("Error with adding the event!");
        }
    }

    /**
     * @return array
     *
     * return all events data from the table
     */
    public function getAllEventsData () {
        $PDO_Connection = $this->initDbConnection();

        $insertQuery = 'SELECT title, detail, eventDate FROM events';
        $allEventsData = array();

        foreach ($PDO_Connection->query($insertQuery) as $row) {
            $eventData = array();
            $eventData['title'] = $row["title"];
            $eventData['detail'] = $row["detail"];
            $allEventsData[$row["eventDate"]][] = $eventData;
        }

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
        $PDO_Connection = $this->initDbConnection();

        $insertQuery = 'SELECT eventDate FROM events';
        $allEvents = array();

        foreach ($PDO_Connection->query($insertQuery) as $row) {
            $allEvents[] = $row["eventDate"];
        }

        return $allEvents;
    }


    /**
     * Return all calendar page with template.
     */
    public function showCalendar() {
        $result = $this->render('calendar.php', []);
        echo $result;
    }
}