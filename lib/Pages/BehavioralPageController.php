<?php

namespace lib\Pages;
use lib\mvc as Mvc;

/**
 * Created by PhpStorm.
 * User: user3
 * Date: 31.03.16
 * Time: 11:34
 *
 * Page for behavioral patterns
 */
class BehavioralPageController extends Mvc\BaseController {

    public function showBehavioralPage() {
        $result = $this->render('behavioral.php', []);
        echo $result;
    }
}