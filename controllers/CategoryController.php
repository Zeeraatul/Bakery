<?php


namespace MyApp;


class CategoryController extends Controller
{
    public function index()
    {
        $catModel = new CategoryModel();
        $this->data['categories'] = $catModel->getAllCategories();

        View::Render( PAGES_PATH.'catindex'.EXT, $this->data);
    }
}