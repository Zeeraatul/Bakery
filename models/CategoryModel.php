<?php


namespace MyApp;


class CategoryModel extends DBContext
{
    public function __construct()
    {
        parent::__construct("categories");
    }
    public function getAllCategories() {
        return $this->getManyRows();
    }

    public function createCategory($category, $description, $targetFile, $imgAlt, $slug)
    {
        return $this->addOneRow([
            'category'=>$category,
            'description'=>$description,
            'imgSrc'=>$targetFile,
            'imgAlt'=>$imgAlt,
            'slug'=>$slug
        ]);
    }

    public function removeCategory($categoryId) {
        return $this->executeQuery("DELETE FROM `". $this->tableName."` WHERE categories.id = $categoryId", "DELETE") == 1;
    }
}