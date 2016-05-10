<?php

namespace Pages;
use \mvc as Mvc;

/**
 * Created by PhpStorm.
 * User: user3
 * Date: 31.03.16
 * Time: 11:34
 *
 * Page for structural patterns
 */
class StructuralPageController extends Mvc\BaseController {

    public function showStructuralPage() {
        $result = $this->render('structural.php', []);
        echo $result;
    }
}