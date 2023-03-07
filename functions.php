<?php

function varSuperDump($obj) {
    echo '<pre>';
    var_dump($obj);
    echo '</pre>';
}

function AutoloadClassRegister($className) {
    $directories = [
        CORE_PATH,
        DB_PATH,
        MODELS_PATH,
        CONTRL_PATH,
        ADM_CORE_PATH,
        ADM_CONTRL_PATH,
        ADM_MODELS_PATH
    ];

    foreach ($directories as $dir) {
        $className = explode('\\', $className);
        $className = end($className);
        if(file_exists($dir.$className.EXT)) {
            require_once $dir.$className.EXT;
            return;
        }
    }
}

spl_autoload_register('AutoloadClassRegister');         //механизм автоматической загрузки классов
