<?php

namespace lib\mvc;

use lib;

class BaseController extends lib\MoPower {

    protected $view;

    public function __construct(View $view = null) {
        parent::__construct();

        $this->view = $view ?: new View();
    }

    public function render ($filePath, array $variables = []) {
        return $this->view->render($filePath, $variables);
    }
}