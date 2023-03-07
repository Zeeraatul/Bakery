<?php
session_start();

require_once "../config.php";
require_once ABS_PATH."functions" . EXT;

require_once ADMIN_PATH . "admfunctions.php";


if (DEVELOP_MODE == true) {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

try {
    // инициализация приложения
    \MyApp\AdmKernel::init();
} catch (Exception $ex) {
    //  логировать все ошибки!!!!
}



