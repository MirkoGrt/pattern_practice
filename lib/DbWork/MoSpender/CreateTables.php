<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 20.05.16
 * Time: 10:36
 */

namespace lib\DbWork\MoSpender;


class CreateTables {

    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    /**
     * @param $tableName
     *
     * function for creating table for money income
     */
    public function createMoneyIncomeTable ($tableName) {
        $PDO_Connection = $this->dbConnection;

        $sql = 'CREATE TABLE ' . $tableName .' (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  moneyReason varchar(255),
                  moneyQuantity int(11),
                  moneyCurrency varchar(255),
                  moneyCategories text,
                  moneyDay int(11),
                  moneyMonth int(11),
                  moneyYear int(11),
                  moneyTimestamp varchar(10),
                  PRIMARY KEY (id)
                  
                ) DEFAULT CHARSET=utf8 ENGINE=InnoDB;';

        $PDO_Connection->exec($sql);
    }

    /**
     * @param $tableName
     *
     * SQL for creating categories table (the same structure for money income and spender items categories)
     */
    public function createTableCategories ($tableName) {
        $PDO_Connection = $this->dbConnection;

        $sql = 'CREATE TABLE ' . $tableName .' (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  categoryName varchar(255),
                  PRIMARY KEY (id)
                  
                ) DEFAULT CHARSET=utf8 ENGINE=InnoDB;';

        $PDO_Connection->exec($sql);
    }

    /**
     * @param $tableName
     *
     * SQL for creating year items table
     */
    public function createTableForYearItems ($tableName) {
        $PDO_Connection = $this->dbConnection;

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
                  
                ) DEFAULT CHARSET=utf8 ENGINE=InnoDB;';

        $PDO_Connection->exec($sql);
    }
}