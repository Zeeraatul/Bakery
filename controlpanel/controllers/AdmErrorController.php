<?php


namespace MyApp {

    class AdmErrorController extends Controller
    {
        public function index()
        {
            AdminView::Render(ADM_PAGES_PATH.'adminindex'.EXT, $this->data);
        }
    }
}