<?php
    $hostName = 'localhost';
    $userName = 'root';
    $password = 'root';

    $db_connection = mysqli_connect($hostName, $userName, $password);

    $db_connection or die('ERROR with connection to MYSQL server . . .<hr />');

    /* Writing connection variable to session to use on whole site */
    session_start();
    $_SESSION['db_connection'] = $db_connection;
?>