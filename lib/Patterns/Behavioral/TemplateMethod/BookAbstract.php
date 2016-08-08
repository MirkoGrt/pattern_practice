<?php

namespace lib\Patterns\Behavioral\TemplateMethod;

abstract class BookAbstract {
    public final function FlipTrough ($book, $start, $step, $direction) {
        $this->baseFunction();
        $number = $book->getNumber();
        if ($direction == 'up') {
            return $this->PageForward($start, $step, $number);
        } elseif ($direction == 'down') {
            return $this->PageBack($start, $step, $number);
        }
    }

    abstract function PageForward($page, $step, $number);
    abstract function PageBack($page, $step, $number);

    private function baseFunction () {
        echo '<hr /><p><em>{ Base functionality - the same for all templates }</em></p>';
    }
}