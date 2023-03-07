<?php


namespace MyApp {

    class AdmKernel
    {
        private static $router;

        public static function init() {
            self::$router = new AdmRouter();
            self::$router->start();
        }
    }
}