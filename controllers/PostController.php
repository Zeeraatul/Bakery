<?php


namespace MyApp;


class PostController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $catM = new CategoryModel();
        $this->data['categories'] = $catM->getAllCategories();
        $tagM = new TagsModel();
        $this->data['tags'] = $tagM->getAllNotEmptyTags();
    }

    public function index()     //просмотр всех постов с фильтрами
    {
        View::Render( PAGES_PATH.'postindex'.EXT, $this->data);
    }
    public function allPostsByCategory() {
        // С пагинацией
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            if(isset($_GET['slug'])) {
                $page = htmlspecialchars(trim($_GET['slug']));
                $postM = new PostsModel();
                $posts =  $postM->getAllPostByCategorySlug($page);
                if(count($posts) > 0) {
                    $this->data['posts'] = $posts;
                    View::Render( PAGES_PATH.'postindex'.EXT, $this->data);
                } else {
                    $this->data['error'] = "Список постов пуст";
                    View::Render( PAGES_PATH.'postsNotFound'.EXT, $this->data);
                }
            } else {
                $this->data['error'] = "Выбранной категории постов не существует";
                View::Render( PAGES_PATH.'postsNotFound'.EXT, $this->data);
            }
        }
    }

    public function allPosts() {
        // С пагинацией
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            if(isset($_GET['page'])) {
                $postM = new PostsModel();
                $posts =  $postM->getAllPost();
                if(count($posts) > 0) {
                    $this->data['posts'] = $posts;
                    View::Render( PAGES_PATH.'postindex'.EXT, $this->data);
                } else {
                    $this->data['error'] = "Список постов пуст";
                    View::Render( PAGES_PATH.'postsNotFound'.EXT, $this->data);
                }
            } else {
                $this->data['error'] = "Страница пуста";
                View::Render( PAGES_PATH.'postsNotFound'.EXT, $this->data);
            }
        }
    }

    public function getPaginationView() {
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            if(isset($_GET['page'])) {
                $slug = $_GET['page'];
                $postM = new PostsModel();
                $posts = $postM->getAllPostByCategorySlug($slug);

                $post_count = 3;
                $pages_count = floor(count($posts) / $post_count);
            }
        }
    }

    public function getOnePost() {
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            if(isset($_GET['slug'])) {
                $slug = htmlspecialchars(trim($_GET['slug']));
                $postM = new PostsModel();
                $post =  $postM->getOnePost($slug);
                if(!is_null($post)) {
                    $this->data['onePost'] = $post;
                    View::Render( PAGES_PATH.'onePost'.EXT, $this->data);
                    return;
                }
            }
        }
        $this->data['error'] = "Информация о посте не найдена";
        View::Render( PAGES_PATH.'postsNotFound'.EXT, $this->data);
    }
}