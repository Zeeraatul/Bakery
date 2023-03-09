<?php


namespace MyApp;


class AboutController extends Controller
{

    public function index()
    {
        View::Render( PAGES_PATH.'about'.EXT, $this->data);
    }
    public function contactus()
    {
        View::Render( PAGES_PATH.'contactus'.EXT, $this->data);
    }
}
