<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 21.04.16
 * Time: 10:40
 */

namespace DbWork;

class DbConnection {

    /**
     * @return \PDO
     *
     * do connection to DB
     */
    public function initDbConnection () {
        $userName = 'root';
        $password = 'root';

        $PDO_Connection = new \PDO('mysql:host=localhost; dbname=practice_calendar; charset=utf8mb4', $userName, $password);

        $PDO_Connection or die('ERROR with connection to MYSQL server . . .<hr />');

        return $PDO_Connection;
    }
}