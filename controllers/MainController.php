<?php

namespace MyApp {
    class MainController extends Controller
    {
        public function index()
        {
           View::Render(PAGES_PATH.'mainindex'.EXT, $this->data);
        }

    }
}