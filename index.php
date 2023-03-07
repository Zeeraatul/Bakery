<?php

require_once "config.php";
require_once "functions" . EXT;

use MyApp\DBContext;
use MyApp\OptionsModel;


if (DEVELOP_MODE == true) {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

try {
    // инициализация приложения
    \MyApp\Kernel::init();
} catch (Exception $ex) {
    //  логировать все ошибки!!!!
}



