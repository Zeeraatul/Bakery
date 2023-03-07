<?php


namespace MyApp {
    class AdminView
    {
        public static function Render($contentView, $data = null, $templateView = ADM_VIEWS_PATH.'templateView'.EXT ) {
            require $templateView;
        }
    }
}