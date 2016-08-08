<?php

namespace lib\Patterns\Behavioral\TemplateMethod;


class MedicalBookTemplate extends BookAbstract {

    public $currentPage;

    public function PageForward ($page, $step, $number) {
        for ($i = $page; $i < $number; $i += $step) {
            $this->currentPage[] = $i . '-' . '&#9819';
        }
        return $this->currentPage;
    }

    public function PageBack ($page, $step, $number) {
        for ($i = $page; $i > 0; $i -= $step) {
            $this->currentPage[] = $i . '-' . '&#9819';
        }
        return $this->currentPage;
    }
}