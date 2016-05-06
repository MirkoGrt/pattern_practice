<?php

/**
 * Created by PhpStorm.
 * User: user3
 * Date: 06.05.16
 * Time: 10:42
 */

namespace Patterns\Creational\Singleton;

class BookSingleton {
    private $author = "John";
    private $title = "John's book";
    private static $book = NULL;
    private static $isLoanedOut = false;

    private function __construct () {}

    static function borrowBook () {
        if (false == self::$isLoanedOut) {
            if (NULL == self::$book) {
                self::$book = new BookSingleton();
            }
            self::$isLoanedOut = true;
            return self::$book;
        } else {
            return NULL;
        }
    }

    function returnBook (BookSingleton $bookReturned) {
        self::$isLoanedOut = false;
    }

    function getAuthor () {
        return $this->author;
    }

    function getTitle () {
        return $this->title;
    }

    function getAuthorAndTitle () {
        return $this->getTitle() . " by " . $this->getAuthor();
    }
}