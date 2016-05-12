<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 11.05.16
 * Time: 9:55
 */

namespace Pages;
use \mvc as Mvc;
use \DbWork;


class MoSpenderController extends Mvc\BaseController {

    public function getDataBase () {
        return new DbWork\DbConnection('root', 'root', 'moSpender');
    }

    /**
     *  adding item to DB table
     */
    public function addSenderItem () {
        $PDO_Connection = $this->getDataBase()->initDbConnection();

        // Getting POST data
        $itemName = $_POST['itemName'];
        $itemPrice = $_POST['itemPrice'];
        $itemPriceCurrency = $_POST['itemPriceCurrency'];
        $itemTags = $_POST['itemTags'];
        $itemCategories = $_POST['itemCategories'];
        $itemDay = $_POST['itemDay'];
        $itemMonth = $_POST['itemMonth'];

        $tableForYearItems = $this->getTableName();

        // if there no table for current year - create it
        if (!$this->checkIfTableForYearExist($tableForYearItems)) {
            $this->createTableForYearItems($tableForYearItems);
        }

    }

    /**
     * @return string
     *
     * Get the name of table for year items
     */
    public function getTableName () {
        $currentYear = date('Y');
        $tableName = 'spender_items_' . $currentYear;

        return $tableName;
    }


    public function createTableForYearItems ($tableName) {
        $PDO_Connection = $this->getDataBase()->initDbConnection();

        $sql = 'CREATE TABLE ' . $tableName .' (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  itemName varchar(255),
                  itemPrice int(11),
                  itemTags text,
                  itemCategories text,
                  itemDay int(11),
                  itemMonth int(11),
                  itemTimestamp timestamp,
                  PRIMARY KEY (id)
                ) ENGINE=InnoDB;';

        $PDO_Connection->exec($sql);
    }

    /**
     * @param $tableName
     * @return bool
     *
     * check if table for current year exists
     */
    public function checkIfTableForYearExist ($tableName) {
        $PDO_Connection = $this->getDataBase()->initDbConnection();

        $results = $PDO_Connection->query("SHOW TABLES LIKE '$tableName'");
        if ($results->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * return page view (display the page)
     */
    public function showMoSpender() {
        $result = $this->render('mo-spender.php', []);
        echo $result;
    }
}