<?php

/**
 * Class Calendar
 */
class Calendar {

    /**
     * @return PDO
     */
    public function initDbConnection () {
        $userName = 'root';
        $password = 'root';

        $calendar_connection = new PDO('mysql:host=localhost; dbname=practice_calendar; charset=utf8mb4', $userName, $password);

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
     * (all events timestamp from events table)
     */
    public function getEventsTimestamp () {
        $PDO_Connection = $this->initDbConnection();

        $insertQuery = 'SELECT eventDate FROM events';
        $allEvents = array();

        foreach ($PDO_Connection->query($insertQuery) as $row) {
            $allEvents[] = $row["eventDate"];
        }

        return $allEvents;
    }

    /**
     * @param $dayTimestamp
     * @return mixed
     *
     * Return event title by event timestamp
     */
    public function getEventTitle ($dayTimestamp) {
        $PDO_Connection = $this->initDbConnection();

        $insertQuery = $PDO_Connection->prepare(
            'SELECT title FROM events WHERE eventDate = :eventDayTimestamp'
        );
        $insertQuery->bindParam(':eventDayTimestamp', $dayTimestamp);
        $insertQuery->execute();

        $eventTitle = $insertQuery->fetch();

        return $eventTitle['title'];
    }

    /**
     * @param $dayTimestamp
     * @return mixed
     *
     * Return event details by event timestamp
     */
    public function getEventDetails ($dayTimestamp) {
        $PDO_Connection = $this->initDbConnection();

        $insertQuery = $PDO_Connection->prepare(
            'SELECT detail FROM events WHERE eventDate = :eventDayTimestamp'
        );

        $insertQuery->bindParam(':eventDayTimestamp', $dayTimestamp);
        $insertQuery->execute();

        $eventDetail = $insertQuery->fetch();

        return $eventDetail['detail'];
    }
}