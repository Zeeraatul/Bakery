<?php


namespace MyApp {
    class View
    {
        public static function Render($contentView, $data = null, $templateView = VIEWS_PATH.'templateView'.EXT ) {
            require $templateView;
        }
    }
}