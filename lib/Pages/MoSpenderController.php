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
     *  adding item to DB table / add item to current year table
     */
    public function addSenderItem () {
        $PDO_Connection = $this->getDataBase()->initDbConnection();

        // Getting POST data
        $itemName = $_POST['itemName'];
        $itemPrice = $_POST['itemPrice'];
        $itemPriceCurrency = $_POST['itemPriceCurrency'];
        $itemTags = $_POST['itemTags'];
        $itemCategories = $_POST['itemCategories'];
        $itemDay = $this->convertDataValue($_POST['itemDay']);
        $itemMonth = $this->convertDataValue($_POST['itemMonth']);

        $itemYear = $_POST['itemYear'];
        if (!$itemYear) {
            $itemYear = date('Y');
        }

        $itemTimestamp = strtotime($itemYear . $itemMonth . $itemDay);

        $tableForYearItems = $this->getTableName($itemYear);

        // if there are no table for current year - create it
        if (!$this->checkIfTableForYearExist($tableForYearItems)) {
            $this->createTableForYearItems($tableForYearItems);
        }

        /* MySQL insert query. PDO prepared query */
        $insertQuery = $PDO_Connection->prepare(
            'INSERT INTO ' . $tableForYearItems .' (itemName, itemPrice, itemPriceCurrency, itemTags, itemCategories, itemDay, itemMonth, itemTimestamp)
                VALUES (:itemName, :itemPrice, :itemPriceCurrency, :itemTags, :itemCategories, :itemDay, :itemMonth, ' . $itemTimestamp .')'
        );

        /* Binding params */
        $insertQuery->bindParam(':itemName', $itemName);
        $insertQuery->bindParam(':itemPrice', $itemPrice);
        $insertQuery->bindParam(':itemPriceCurrency', $itemPriceCurrency);
        $insertQuery->bindParam(':itemTags', $itemTags);
        $insertQuery->bindParam(':itemCategories', $itemCategories);
        $insertQuery->bindParam(':itemDay', $itemDay);
        $insertQuery->bindParam(':itemMonth', $itemMonth);


        /* Running and checking the query */
        if ($insertQuery->execute()) {
            echo json_encode('Success! MoItem is added is added');
        } else {
            echo json_encode("Error with adding the item!");
        }

    }

    /**
     * @param $year
     * @return string
     *
     * Get the name of table for year items
     */
    public function getTableName ($year) {
        $tableName = 'spender_items_' . $year;

        return $tableName;
    }


    /**
     * @param $tableName
     *
     * SQL for creating year items table
     */
    public function createTableForYearItems ($tableName) {
        $PDO_Connection = $this->getDataBase()->initDbConnection();

        $sql = 'CREATE TABLE ' . $tableName .' (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  itemName varchar(255),
                  itemPrice int(11),
                  itemPriceCurrency varchar(255),
                  itemTags text,
                  itemCategories text,
                  itemDay int(11),
                  itemMonth int(11),
                  itemTimestamp varchar(10),
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
     * @param $value
     * @return string
     *
     * If we enter the '3' day, this function convert it to '03'.
     */
    public function convertDataValue ($value) {
        if (strlen($value) <= 1) {
            $value = '0' . $value;
            return $value;
        } else {
            return $value;
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