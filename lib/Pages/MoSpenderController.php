<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 11.05.16
 * Time: 9:55
 */

namespace Pages;
use \mvc as Mvc;


class MoSpenderController extends Mvc\BaseController {
    public function showMoSpender() {
        $result = $this->render('mo-spender.php', []);
        echo $result;
    }
}