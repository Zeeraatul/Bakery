<?php


namespace MyApp;


class NavigateModel extends DBContext
{
    public function __construct()
    {
        parent::__construct("navigate");         //вызов конструктора базового класса
    }

    public function getNavigateData() {
        return $this->getManyRows();
    }
}