<?php

abstract class BookAbstract {
    public final function FlipTrough ($book, $start, $step, $direction) {
        $number = $book->getNumber();
        if ($direction == 'up') {
            return $this->PageForward($start, $step, $number);
        } elseif ($direction == 'down') {
            return $this->PageBack($start, $step, $number);
        }
    }

    abstract function PageForward($page, $step, $number);
    abstract function PageBack($page, $step, $number);
}

class CookBookTemplate extends BookAbstract {

    public $currentPage;

    public function PageForward ($page, $step, $number) {
        for ($i = $page; $i < $number; $i += $step) {
            $this->currentPage[] = $i;
        }
        return $this->currentPage;
    }

    public function PageBack ($page, $step, $number) {
        for ($i = $page; $i > 0; $i -= $step) {
            $this->currentPage[] = $i;
        }
        return $this->currentPage;
    }
}

class Book {
    public $numberOfPages;
    public $name;

    public function __construct ($name, $number) {
        $this->numberOfPages = $number;
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getNumber () {
        return $this->numberOfPages;
    }
}