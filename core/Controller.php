<?php


namespace MyApp {


    abstract class Controller
    {
        abstract function index();
        public $userAuth = null;
        protected $data = [];

        public function __construct()
        {
            $this->data['error'] = null;
            $this->data['success'] = null;
            $this->data['message'] = null;
        }
        public function call($method)
        {
            if (method_exists($this, $method)) {
                $this->$method();
            } else {
                throw new \Exception("Method is not exists");
            }
        }
    }
}