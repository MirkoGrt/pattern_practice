<?php
class Autoloader {

    static public function load($className) {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastSeparatorPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastSeparatorPos);
            $className = substr($className, $lastSeparatorPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        require $fileName;
    }
}