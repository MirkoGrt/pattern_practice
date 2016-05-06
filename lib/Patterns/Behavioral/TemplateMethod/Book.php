<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 06.05.16
 * Time: 10:31
 */

namespace Patterns\Behavioral\TemplateMethod;


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