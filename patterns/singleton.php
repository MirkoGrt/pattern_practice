<?php
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
