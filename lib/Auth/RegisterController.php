<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 23.08.16
 * Time: 13:04
 */

namespace lib\Auth;
use lib\mvc as Mvc;

class RegisterController extends Mvc\BaseController {

    public function registerUser () {
        
    }
    
    public function loginUser () {
        
    }

    public function showAuthPage () {
        $result = $this->render('auth-page.php', []);
        echo $result;
    }

}