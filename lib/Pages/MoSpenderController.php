<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 11.05.16
 * Time: 9:55
 */

namespace lib\Pages;
use lib\mvc as Mvc;


class MoSpenderController extends Mvc\BaseController {

    public $categoryTable = 'items_categories';
    public $yearTablePrefix = 'spender_items_';
    public $moneyIncomeTable = 'money_income';
    public $moneyCategoriesTable = 'money_income_categories';

    public function __construct() {
        parent::__construct();

        // Set the connection to DB in "MoPower" class
        $this->setMoSpenderConnection();
    }

    /**
     *  adding item to DB table / add item to current year table
     */
    public function addSpenderItem () {

        // Getting POST data
        $itemName = $_POST['itemName'];
        $itemPrice = $_POST['itemPrice'];
        $itemPriceCurrency = $_POST['itemPriceCurrency'];
        $itemTags = $_POST['itemTags'];
        $itemCategory = $_POST['itemCategories'];
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
        if (!$this->generalFunctions()->checkIfTableExist($tableForYearItems)) {
            $this->moSpenderCreate()->createTableForYearItems($tableForYearItems);
        }

        // if there is no category table - create it
        if (!$this->generalFunctions()->checkIfTableExist($this->categoryTable)) {
            $this->moSpenderCreate()->createTableCategories($this->categoryTable);
        }

        // if new category - write it to DB table
        if ($itemNewCategory) {
            $this->moSpenderInsert()->addNewCategory($itemNewCategory, $this->categoryTable);

            // add item to this new category
            $itemCategory = $itemNewCategory;
        }

        $itemAdd = $this->moSpenderInsert()->addSpenderItem(
            $tableForYearItems,
            $itemName,
            $itemPrice,
            $itemPriceCurrency,
            $itemTags,
            $itemCategory,
            $itemDay,
            $itemMonth,
            $itemTimestamp
        );

        /* Running and checking the query */
        if ($itemAdd) {
            echo json_encode('Success! MoItem is added!');
        } else {
            echo json_encode("Error with adding the item!");
        }
    }

    /**
     * adding money income info to DB
     */
    public function addMoneyIncome () {

        // Getting POST data
        $moneyReason = $_POST['moneyReason'];
        $moneyQuantity = $_POST['moneyQuantity'];
        $moneyCurrency = $_POST['moneyCurrency'];
        $moneyCategory = $_POST['moneyCategory'];
        $moneyNewCategory = $_POST['moneyNewCategory'];
        $moneyDay = $this->convertDataValue($_POST['moneyDay']);
        $moneyMonth = $this->convertDataValue($_POST['moneyMonth']);
        $moneyYear = $_POST['moneyYear'];

        $moneyTimestamp = strtotime($moneyYear . $moneyMonth . $moneyDay);

        // if there is no table for money income - create it
        if (!$this->generalFunctions()->checkIfTableExist($this->moneyIncomeTable)) {
            $this->moSpenderCreate()->createMoneyIncomeTable($this->moneyIncomeTable);
        }

        // if there is no table for money income categories - create it
        if (!$this->generalFunctions()->checkIfTableExist($this->moneyCategoriesTable)) {
            $this->moSpenderCreate()->createTableCategories($this->moneyCategoriesTable);
        }

        // if new category - write it to DB table
        if ($moneyNewCategory) {
            $this->moSpenderInsert()->addNewCategory($moneyNewCategory, $this->moneyCategoriesTable);

            // add item to this new category
            $moneyCategory = $moneyNewCategory;
        }

        $moneyAdd = $this->moSpenderInsert()->addMoney(
            $this->moneyIncomeTable,
            $moneyReason,
            $moneyQuantity,
            $moneyCurrency,
            $moneyCategory,
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
     * @param $table
     * @return array
     *
     * the same function for money income and spender items
     */
    public function getAllCategories ($table) {
        $allCategoriesData = $this->moSpenderSelect()->getCategories($table);
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
        $allCategories = $this->getAllCategories($this->categoryTable);
        $allMoneyIncomeCategories = $this->getAllCategories($this->moneyCategoriesTable);
        $result = $this->render('mo-spender.php', [
            'allCategories' => $allCategories,
            'moneyIncomeCategories' => $allMoneyIncomeCategories
        ]);
        echo $result;
    }
}