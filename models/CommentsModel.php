<?php


namespace MyApp;


class CommentsModel extends DBContext
{
    public function __construct()
    {
        parent::__construct("comments");         //вызов конструктора базового класса
    }
    public function getAllValidComments($postId)
    {
        return $this->getManyRows([
            'postId' => $postId,
            'verified' => true
        ]);
    }
}