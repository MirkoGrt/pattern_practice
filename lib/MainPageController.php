<?php

/**
 * Created by PhpStorm.
 * User: user3
 * Date: 31.03.16
 * Time: 11:18
 */
class MainPageController extends BaseController {

    public function showMainPage() {
        $result = $this->render('main.php', []);
        echo $result;
    }
}