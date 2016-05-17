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
        $itemNewCategory = $_POST['itemNewCategory'];
        $itemDay = $this->convertDataValue($_POST['itemDay']);
        $itemMonth = $this->convertDataValue($_POST['itemMonth']);

        $itemYear = $_POST['itemYear'];
        if (!$itemYear) {
            $itemYear = date('Y');
        }

        $itemTimestamp = strtotime($itemYear . $itemMonth . $itemDay);

        $tableForYearItems = $this->getTableName($itemYear);

        // if there is no table for current year - create it
        if (!$this->checkIfTableExist($tableForYearItems)) {
            $this->createTableForYearItems($tableForYearItems);
        }

        // if there is no category table - create it
        if (!$this->checkIfTableExist('items_categories')) {
            $this->createTableForItemsCategories('items_categories');
        }

        // if new category - write it to DB table
        if ($itemNewCategory) {
            $this->addNewCategory($itemNewCategory, 'items_categories');

            // add item to this new category
            $itemCategories = $itemCategories .',' . $itemNewCategory;
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
     * @param $category
     * @param $categoryTable
     *
     * SQL for adding the new category to DB
     */
    public function addNewCategory ($category, $categoryTable) {
        $PDO_Connection = $this->getDataBase()->initDbConnection();

        $insertQuery = $PDO_Connection->prepare(
            'INSERT INTO ' . $categoryTable .' (categoryName) VALUES (" ' . $category .' ")'
        );

        $insertQuery->execute();
    }

    /**
     * @return array
     *
     * get all categories from DB
     */
    public function getAllCategories () {
        $PDO_Connection = $this->getDataBase()->initDbConnection();

        $insertQuery = 'SELECT id, categoryName FROM items_categories';
        $allCategoriesData = array();

        foreach ($PDO_Connection->query($insertQuery) as $row) {
            $categoryData = array();
            $categoryData['name'] = $row["categoryName"];
            $categoryData['id'] = $row["id"];
            $allCategoriesData[] = $categoryData;
        }

        return $allCategoriesData;
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
     *
     * SQL for creating categories table
     */
    public function createTableForItemsCategories ($tableName) {
        $PDO_Connection = $this->getDataBase()->initDbConnection();

        $sql = 'CREATE TABLE ' . $tableName .' (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  categoryName varchar(255),
                  PRIMARY KEY (id)
                ) ENGINE=InnoDB;';

        $PDO_Connection->exec($sql);
    }

    /**
     * @param $tableName
     * @return bool
     *
     * check if table exists in DB
     */
    public function checkIfTableExist ($tableName) {
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
     * If we enter the '3' day or month, this function convert it to '03'.
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
        $allCategories = $this->getAllCategories();
        $result = $this->render('mo-spender.php', ['allCategories' => $allCategories]);
        echo $result;
    }
}