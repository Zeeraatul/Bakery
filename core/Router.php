<?php

namespace MyApp {
    class Router
    {
        //название контроллера поумолчанию
        private $defaultControllerName = __NAMESPACE__.'\\'."MainController";

        //контроллер ответственный за обработку ошибок
        private $errorControllerName = __NAMESPACE__.'\\'."ErrorController";

        //дейсвие по умолчанию
        private $defaultActionName = "index";


        //имена контроллера и действия - которые будут вытянуты из строки запроса
        private $controllerName = null;
        private $actionName = null;


        //экземпляр контроллера которому будет передано управление
        private $controller = null;


        public function start() {
                $route = $_SERVER['REQUEST_URI'];

                $route = explode('?', $route)[0];

                $routes = explode('/', $route);

                //определяем контроллер-------------------------------------------------start
                 if(empty($routes[1])) {            //если доступ в корень сайта
                     $this->controllerName = $this->defaultControllerName;
                 } else {
                    $this->controllerName = ucfirst( mb_strtolower($routes[1])."Controller");
                    if(file_exists(CONTRL_PATH.$this->controllerName.EXT)) {
                        $this->controllerName = __NAMESPACE__.'\\'.$this->controllerName;
                    } else {
                        // искомого контроллера не существует
                        $this->controllerName = $this->errorControllerName;
                    }
                 }
                //определяем контроллер-------------------------------------------------end
                $this->controller = new $this->controllerName();

                //определяем action-----------------------------------------------------start
                $this->actionName = $this->defaultActionName;
                if(!empty($routes[2])) {            //если не пустой участок с action
                    if(method_exists($this->controller, mb_strtolower($routes[2]))){
                        $this->actionName = mb_strtolower($routes[2]);
                    } else {
                        $this->controllerName = $this->errorControllerName;
                        $this->controller = new $this->controllerName();
                    }
                }
                $this->controller->call($this->actionName);
                //определяем action-----------------------------------------------------end

        }
    }
}