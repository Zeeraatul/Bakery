<?php

namespace MyApp {
    class ErrorController extends Controller
    {
        public function index()
        {
            View::Render( PAGES_PATH.'errorindex'.EXT, $this->data);
        }
    }
}