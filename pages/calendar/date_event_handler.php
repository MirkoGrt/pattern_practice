<?php
    @include '../../DbConnection/connection.php';

    mysqli_select_db($_SESSION['db_connection'], 'practice_calendar') or die('ERROR with selecting DB . . . <hr />');

    /* Getting post data */
    $eventTimestamp = $_POST['timestamp'];
    $eventTitle = $_POST['title'];
    $eventDetails = $_POST['details'];

    /* MySQL insert query */
    $insertQuery = 'INSERT INTO events (title, detail, eventDate, dateAdded)
                    VALUES ("'. $eventTitle .'", "'. $eventDetails .'", "'. $eventTimestamp .'", NOW())';

    /* Running the query */
    $result = mysqli_query($_SESSION['db_connection'], $insertQuery);

    mysqli_close($_SESSION['db_connection']);

    if ($result) {
        echo json_encode("Success! Event added!");
    } else {
        echo json_encode("Error with adding the event!");
    }
?>