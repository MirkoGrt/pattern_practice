<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 20.05.16
 * Time: 13:04
 */

namespace lib\DbWork\MoSpender;


class InsertData {

    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    /**
     * @param $table
     * @param $moneyReason
     * @param $moneyQuantity
     * @param $moneyCurrency
     * @param $moneyCategories
     * @param $moneyDay
     * @param $moneyMonth
     * @param $moneyYear
     * @param $moneyTimestamp
     * @return bool
     *
     * function to run SQL for adding money
     */
    public function addMoney ($table, $moneyReason, $moneyQuantity, $moneyCurrency, $moneyCategories, $moneyDay, $moneyMonth, $moneyYear, $moneyTimestamp) {

        /* MySQL insert query. PDO prepared query */
        $insertQuery = $this->dbConnection->prepare(
            'INSERT INTO ' . $table .' (moneyReason, moneyQuantity, moneyCurrency, moneyCategories, moneyDay, moneyMonth, moneyYear, moneyTimestamp)
                VALUES (:moneyReason, :moneyQuantity, :moneyCurrency, :moneyCategories, :moneyDay, :moneyMonth, :moneyYear, ' . $moneyTimestamp .')'
        );
        /* Binding params */
        $insertQuery->bindParam(':moneyReason', $moneyReason);
        $insertQuery->bindParam(':moneyQuantity', $moneyQuantity);
        $insertQuery->bindParam(':moneyCurrency', $moneyCurrency);
        $insertQuery->bindParam(':moneyCategories', $moneyCategories);
        $insertQuery->bindParam(':moneyDay', $moneyDay);
        $insertQuery->bindParam(':moneyMonth', $moneyMonth);
        $insertQuery->bindParam(':moneyYear', $moneyYear);

        /* Running and checking the query */
        if ($insertQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $table
     * @param $itemName
     * @param $itemPrice
     * @param $itemPriceCurrency
     * @param $itemTags
     * @param $itemCategories
     * @param $itemDay
     * @param $itemMonth
     * @param $itemTimestamp
     * @return bool
     *
     * function to run SQL for adding spender item
     */
    public function addSpenderItem ($table, $itemName, $itemPrice, $itemPriceCurrency, $itemTags, $itemCategories, $itemDay, $itemMonth, $itemTimestamp) {
        /* MySQL insert query. PDO prepared query */
        $insertQuery = $this->dbConnection->prepare(
            'INSERT INTO ' . $table .' (itemName, itemPrice, itemPriceCurrency, itemTags, itemCategories, itemDay, itemMonth, itemTimestamp)
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
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $category
     * @param $categoryTable
     *
     * SQL for adding the new category to DB
     */
    public function addNewCategory ($category, $categoryTable) {

        $insertQuery = $this->dbConnection->prepare(
            'INSERT INTO ' . $categoryTable .' (categoryName) VALUES (" ' . $category .' ")'
        );

        $insertQuery->execute();
    }

}