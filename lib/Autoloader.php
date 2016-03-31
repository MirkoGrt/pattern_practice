<?php
class Autoloader {
    static public function load($className) {
        $filename = $className . '.php';
        $file ='lib/' . $filename;
        if (!file_exists($file)) {
            return false;
        }
        include $file;
    }
}