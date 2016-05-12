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

    public function getDbConnection () {
        return new DbWork\DbConnection('root', 'root', 'moSpender');
    }

    public function showMoSpender() {
        $result = $this->render('mo-spender.php', []);
        echo $result;
    }
}