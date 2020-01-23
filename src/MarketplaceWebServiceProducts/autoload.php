<?php

spl_autoload_register(
    function ($className) {
        $filePath = str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        $includePaths = explode(PATH_SEPARATOR, get_include_path());
        foreach ($includePaths as $includePath) {
            if (file_exists($includePath . DIRECTORY_SEPARATOR . $filePath)) {
                require_once $filePath;
                return;
            }
        }
    });