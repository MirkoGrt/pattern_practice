<?php

/**
 * Created by PhpStorm.
 * User: user3
 * Date: 30.03.16
 * Time: 9:58
 */
class View {

    protected $viewPath = 'pages/';
    protected $layoutPath = 'pages/';

    /**
     * @param $filePath
     * @param array $variables
     * @return string
     */
    public function render ($filePath, array $variables = []) {
        extract($variables);
        $fullPath = $this->viewPath . $filePath;

        if (file_exists($fullPath)) {
            ob_start();
            include $fullPath;
            $content = ob_get_contents();
            ob_end_clean();
            if (file_exists($this->getLayoutPath())) {
                ob_start();
                include $this->getLayoutPath();
                $renderedView = ob_get_contents();
                ob_get_clean();
            } else {
                echo 'Layout File not exists!';
            }
        } else {
            echo 'View File not exists!';
        }

        return $renderedView;
    }

    protected function getLayoutPath ($layout = 'mainLayout') {
        return $this->layoutPath . $layout . '.php';
    }
}