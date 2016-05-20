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

    public $categoryTable = 'items_categories';
    public $yearTablePrefix = 'spender_items_';
    public $moneyIncomeTable = 'money_income';
    public $moneyCategoriesTable = 'money_income_categories';

    public function getDataBase () {
        return new DbWork\DbConnection('root', 'root', 'moSpender');
    }

    /**
     *  adding item to DB table / add item to current year table
     */
    public function addSpenderItem () {
        $PDO_Connection = $this->getDataBase()->initDbConnection();
        $moSpenderCreate = new DbWork\MoSpender\CreateTables($PDO_Connection);
        $DbGeneralFunctions = new DbWork\GeneralFunctions($PDO_Connection);
        $moSpenderInsert = new DbWork\MoSpender\InsertData($PDO_Connection);

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
        if (!$DbGeneralFunctions->checkIfTableExist($tableForYearItems)) {
            $moSpenderCreate->createTableForYearItems($tableForYearItems);
        }

        // if there is no category table - create it
        if (!$DbGeneralFunctions->checkIfTableExist($this->categoryTable)) {
            $moSpenderCreate->createTableCategories($this->categoryTable);
        }

        // if new category - write it to DB table
        if ($itemNewCategory) {
            $moSpenderInsert->addNewCategory($itemNewCategory, $this->categoryTable);

            // add item to this new category
            $itemCategories = $itemCategories .',' . $itemNewCategory;
        }

        $itemAdd = $moSpenderInsert->addSpenderItem(
            $tableForYearItems,
            $itemName,
            $itemPrice,
            $itemPriceCurrency,
            $itemTags,
            $itemCategories,
            $itemDay,
            $itemMonth,
            $itemTimestamp
        );

        /* Running and checking the query */
        if ($itemAdd) {
            echo json_encode('Success! MoItem is added is added');
        } else {
            echo json_encode("Error with adding the item!");
        }
    }

    /**
     * adding money income info to DB
     */
    public function addMoneyIncome () {
        $PDO_Connection = $this->getDataBase()->initDbConnection();
        $moSpenderCreate = new DbWork\MoSpender\CreateTables($PDO_Connection);
        $DbGeneralFunctions = new DbWork\GeneralFunctions($PDO_Connection);
        $moSpenderInsert = new DbWork\MoSpender\InsertData($PDO_Connection);

        // Getting POST data
        $moneyReason = $_POST['moneyReason'];
        $moneyQuantity = $_POST['moneyQuantity'];
        $moneyCurrency = $_POST['moneyCurrency'];
        $moneyCategories = $_POST['moneyCategory'];
        $moneyNewCategory = $_POST['moneyNewCategory'];
        $moneyDay = $this->convertDataValue($_POST['moneyDay']);
        $moneyMonth = $this->convertDataValue($_POST['moneyMonth']);
        $moneyYear = $_POST['moneyYear'];

        $moneyTimestamp = strtotime($moneyYear . $moneyMonth . $moneyDay);

        // if there is no table for money income - create it
        if (!$DbGeneralFunctions->checkIfTableExist($this->moneyIncomeTable)) {
            $moSpenderCreate->createMoneyIncomeTable($this->moneyIncomeTable);
        }

        // if there is no table for money income categories - create it
        if (!$DbGeneralFunctions->checkIfTableExist($this->moneyCategoriesTable)) {
            $moSpenderCreate->createTableCategories($this->moneyCategoriesTable);
        }

        // if new category - write it to DB table
        if ($moneyNewCategory) {
            $moSpenderInsert->addNewCategory($moneyNewCategory, $this->moneyCategoriesTable);

            // add item to this new category
            $moneyCategories = $moneyCategories .',' . $moneyNewCategory;
        }

        $moneyAdd = $moSpenderInsert->addMoney(
            $this->moneyIncomeTable,
            $moneyReason,
            $moneyQuantity,
            $moneyCurrency,
            $moneyCategories,
            $moneyDay,
            $moneyMonth,
            $moneyYear,
            $moneyTimestamp
        );

        if ($moneyAdd) {
            echo json_encode('Success! Money added');
        } else {
            echo json_encode("Error with adding money!");
        }
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
        $tableName = $this->yearTablePrefix . $year;

        return $tableName;
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