<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 06.05.16
 * Time: 10:31
 */

namespace lib\Patterns\Behavioral\TemplateMethod;


class CookBookTemplate extends BookAbstract {

    public $currentPage;

    public function PageForward ($page, $step, $number) {
        for ($i = $page; $i < $number; $i += $step) {
            $this->currentPage[] = $i . '-' . '&#9818';
        }
        return $this->currentPage;
    }

    public function PageBack ($page, $step, $number) {
        for ($i = $page; $i > 0; $i -= $step) {
            $this->currentPage[] = $i . '-' . '&#9818';
        }
        return $this->currentPage;
    }
}