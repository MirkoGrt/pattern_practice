<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 06.05.16
 * Time: 10:43
 */

namespace Patterns\Creational\Singleton;


class BookBorrower {
    private $borrowedBook;
    private $haveBook = false;

    function __construct () {}

    function getAuthorAndTitle () {
        if ($this->haveBook == true) {
            return $this->borrowedBook->getAuthorAndTitle();
        } else {
            return "There are no book.. Someone has borrowed it..";
        }
    }

    function borrowBook () {
        $this->borrowedBook = BookSingleton::borrowBook();
        if ($this->borrowedBook == NULL ) {
            $this->borrowedBook = false;
        } else {
            $this->haveBook = true;
        }
    }

    function returnBook () {
        $this->borrowedBook->returnBook($this->borrowedBook);
    }
}