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

            $this->userAuth = new UserAuthentication();

            $this->formatOptions();
            $this->formatNavigation();
        }

        protected function formatOptions()
        {
            $optModel = new  OptionsModel();
            $this->data['options'] = [];

            foreach ($optModel->getAllOptions() as $key => $value) {
                $this->data['options'][$value['name']] = $value;
            }
            unset($optModel);
        }

        protected function formatNavigation()
        {
            $navBarModel = new NavigateModel();
            $this->data['navigate'] = [];

            $result = $navBarModel->getNavigateData();                              // вся навигация

            foreach ($result as $key => $navElem) {
                if (is_null($navElem['parent_id'])) {                               //если это компонент вверхнего уровня.....
                    $navElem['childs'] = [];
                    array_push($this->data['navigate'], $navElem);
                }
            }

            foreach ($this->data['navigate'] as $parentInd => $parent) {            //перебираем компоненты верхнего уровня
                foreach ($result as $childIndex => $child) {                        //перебираем все компоненты
                    if($child['parent_id'] == $parent["Id"]) {                      //ищем дочерние элементы
                        array_push($this->data['navigate'][$parentInd]['childs'], $child);
                    }
                }
            }
            unset($navBarModel);
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