<?php

/**
 * Created by PhpStorm.
 * User: user3
 * Date: 31.03.16
 * Time: 11:34
 */
class JsPageController extends BaseController {

    public function showJsPage() {
        $result = $this->render('js.php', []);
        echo $result;
    }
}