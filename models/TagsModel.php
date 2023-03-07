<?php


namespace MyApp;


class TagsModel extends DBContext
{
    public function __construct()
    {
        parent::__construct("tags");         //вызов конструктора базового класса
    }

    public function getAllNotEmptyTags()
    {
        return $this->executeQuery("SELECT * FROM tags WHERE countPosts > 0");
    }
}