<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 24.06.16
 * Time: 10:47
 */

namespace DbWork\MoSpender;


class SelectData {
    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    /**
     * @param $table
     * @return array
     */
    public function getCategories ($table) {
        $insertQuery = 'SELECT id, categoryName FROM ' . $table;
        $allCategoriesData = array();

        foreach ($this->dbConnection->query($insertQuery) as $row) {
            $categoryData = array();
            $categoryData['name'] = $row["categoryName"];
            $categoryData['id'] = $row["id"];
            $allCategoriesData[] = $categoryData;
        }

        return $allCategoriesData;
    }

}