<?php

namespace Pages;
use \mvc as Mvc;

/**
 * Created by PhpStorm.
 * User: user3
 * Date: 31.03.16
 * Time: 11:34
 *
 * Page for creational patterns
 */
class CreationalPageController extends Mvc\BaseController {

    public function showCreationalPage() {
        $result = $this->render('creational.php', []);
        echo $result;
    }
}