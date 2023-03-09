<?php


namespace MyApp;


class PostsModel extends DBContext
{
    public function __construct()
    {
        parent::__construct("posts");         //вызов конструктора базового класса
    }
    public function getAllPostByCategorySlug($slug) {
        /*return $this->executeQuery("SELECT posts.Id, posts.title, posts.slogan, posts.imgSrc, posts.imgAlt, posts.slug, posts.dateOfPublished, posts.countComments FROM posts
	                WHERE posts.state = 'published' AND posts.categoryId = (SELECT Id FROM categories WHERE categories.slug = '$slug') ORDER BY dateOfPublished DESC");*/

        return $this->executeQuery("SELECT posts.Id, posts.title, posts.slogan, posts.imgSrc, posts.imgAlt, posts.slug, posts.dateOfPublished, posts.countComments,
                    categories.category
                    FROM posts LEFT JOIN categories ON posts.categoryId = categories.Id
                    WHERE posts.state = 'published' AND categories.slug = '$slug' ORDER BY dateOfPublished DESC");
    }

    public function getAllPost() {
        /*return $this->executeQuery("SELECT posts.Id, posts.title, posts.slogan, posts.imgSrc, posts.imgAlt, posts.slug, posts.dateOfPublished, posts.countComments FROM posts
	                WHERE posts.state = 'published' AND posts.categoryId = (SELECT Id FROM categories WHERE categories.slug = '$slug') ORDER BY dateOfPublished DESC");*/

        return $this->executeQuery("SELECT posts.Id, posts.title, posts.slogan, posts.imgSrc, posts.imgAlt, posts.slug, posts.dateOfPublished, posts.countComments,
                    categories.category
                    FROM posts LEFT JOIN categories ON posts.categoryId = categories.Id
                    WHERE posts.state = 'published' ORDER BY dateOfPublished DESC");
    }

    public function getOnePost($slug)
    {
        $result = $this->executeQuery("SELECT posts.Id, posts.title, posts.slogan,posts.content, posts.imgSrc, posts.imgAlt, posts.slug, posts.dateOfPublished, 
                    posts.countComments, categories.category
                    FROM posts LEFT JOIN categories ON posts.categoryId = categories.Id
                    WHERE posts.state = 'published' AND posts.slug = '$slug'");
        if(count($result) == 1) {
            return $result[0];
        } else return  null;
    }
}