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

    private $usersTableName = 'angry_users';

    public function registerUser () {
        // if there is no table for users
        if (!$this->generalFunctions()->checkIfTableExist($this->usersTableName)) {
            $this->authCreate()->createUsersTable($this->usersTableName);
        }

        $passHash = hash('md5', $_POST['pass']);

        $userAdd = $this->authInsert()->insertUserToDb(
            $this->usersTableName,
            $_POST['email'],
            $_POST['nickname'],
            $_POST['slogan'],
            $passHash
        );

        if ($userAdd) {
            echo json_encode('Success! You are now registered!');
        } else {
            echo json_encode('Error with registration! ');
        }
    }
    
    public function loginUser () {
        
    }

    public function showAuthPage () {
        $result = $this->render('auth-page.php', []);
        echo $result;
    }

}