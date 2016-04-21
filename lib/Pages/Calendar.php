<?php

namespace Pages;
use \mvc as Mvc;
use \DbWork;

/**
 * Class Calendar
 */
class Calendar extends Mvc\BaseController {

    /**
     * @return DbWork\DbConnection
     * function to get DB Connection from DbConnection class
     */
    public function getDataBase () {
        return new DbWork\DbConnection();
    }

    /**
     * Adding event to events table
     */
    public function addEvent() {
        $PDO_Connection = $this->getDataBase()->initDbConnection();

        /* Getting post data */
        $eventTimestamp = $_POST['timestamp'];
        $eventTitle = $_POST['title'];
        $eventDetails = $_POST['details'];

        /* MySQL insert query. PDO prepared query */
        $insertQuery = $PDO_Connection->prepare(
            'INSERT INTO events (title, detail, eventDate, dateAdded, eventStatus)
                VALUES (:eventTitle, :eventDetails, :eventTimestamp, NOW(), 1)'
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
     * Function to toggle event status (0/1)
     */
    public function changeEventStatus () {
        $PDO_Connection = $this->getDataBase()->initDbConnection();
        $eventId = $_POST['id'];

        $insertQuery = $PDO_Connection->prepare(
            'UPDATE events
              SET eventStatus = !eventStatus
              WHERE id = :eventId'
        );

        $insertQuery->bindParam(':eventId', $eventId);

        if ($insertQuery->execute()) {
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
        $eventId = $_POST['id'];

        $insertQuery = $PDO_Connection->prepare(
            'DELETE FROM events WHERE id = :eventId'
        );

        $insertQuery->bindParam(':eventId', $eventId);

        if ($insertQuery->execute()) {
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

        $insertQuery = 'SELECT id, title, detail, eventStatus, eventDate FROM events';
        $allEventsData = array();

        foreach ($PDO_Connection->query($insertQuery) as $row) {
            $eventData = array();
            $eventData['title'] = $row["title"];
            $eventData['detail'] = $row["detail"];
            $eventData['id'] = $row["id"];
            $eventData['status'] = $row["eventStatus"];
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
        $PDO_Connection = $this->getDataBase()->initDbConnection();

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