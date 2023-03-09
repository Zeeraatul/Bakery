<?php


namespace MyApp;


class PostTagsModel extends DBContext
{
    public function __construct()
    {
        parent::__construct("posttags");         //вызов конструктора базового класса
    }
}