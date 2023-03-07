<?php


namespace MyApp {

    class Kernel
    {
        private static $router;

        public static function init() {
            self::$router = new Router();
            self::$router->start();
        }
    }
}