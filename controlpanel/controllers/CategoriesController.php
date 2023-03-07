<?php


namespace MyApp;


class CategoriesController extends Controller
{

    function index()
    {
        if ($this->userAuth->isAuth()) {
            $catM = new CategoryModel();
            $this->data['categories'] = $catM->getAllCategories();
            AdminView::Render(ADM_PAGES_PATH . 'allCategories' . EXT, $this->data);
            return;
        } else {
            $this->login();
        }
    }

    public function createCategory()
    {
        
        if ($this->userAuth->isAuth()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST["category"]) && isset($_POST["description"]) && isset($_POST["imgAlt"]) && isset($_POST["slug"]) && isset($_FILES["imgSrc"])) {
                    // Валидация!!!!!!!!!!!!!!!!!
                    $category = htmlspecialchars(trim($_POST["category"]));
                    $description = htmlspecialchars(trim($_POST["description"]));
                    $imgAlt = htmlspecialchars(trim($_POST["imgAlt"]));
                    $slug = htmlspecialchars(trim($_POST["slug"]));
                    // загрузить на сервер по указанногому адрессу
                    // добавить информацию в бд
                    $destDir = ABS_PATH.'/static/img/categories/';
                    $targetFile = $destDir . basename($_FILES["imgSrc"]['name']);
                    $imgExt = mb_strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    //$targetFile = $destDir.$_POST["slug"].".".$imgExt;
                    $targetFile = $destDir.mb_substr(hash("sha256",$_POST["slug"]), 0, 8).".".$imgExt;
                    $uploadOk = false;
                    if ($imgExt == 'png' || $imgExt == 'jpg' || $imgExt == 'jpeg' || $imgExt == 'gif' || $imgExt == 'jfif') {
                        $uploadOk = true;
                    } else {
                        $this->data['error'] = "Недопустимый формат файла";
                    }
                    if ($_FILES["imgSrc"]['size'] > 180000) {
                        $uploadOk = false;
                        $this->data['error'] = "Файл слишком большой. Сожмите его в размер не более 120KB";
                    }
                    if(move_uploaded_file($_FILES["imgSrc"]["tmp_name"], $targetFile)) {
                        $catM = new CategoryModel();
                        //echo mb_substr($targetFile, mb_strpos($targetFile,"/"));
                        if($catM->createCategory($category, $description, mb_substr($targetFile, mb_strpos($targetFile,"/")),  $imgAlt, $slug)){
                            $this->data['success'] = "Категория успешно создана";
                            header('Location: /controlpanel/Categories/Index');
                            exit;
                        } else {
                            $this->data['error'] = "При создании категории произошла ошибка";
                            unlink($targetFile);
                            $this->index();
                        }
                    } else {
                        $this->data['error'] = "Загрузка файла на сервер не удалась";
                    }
                }
            }
        } else {
            $this->login();
        }
    }

    public function removeCategory() {
        if ($this->userAuth->isAuth()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['removeId'])) {
             $categoryId = intval($_POST['removeId']);
             if ($categoryId > 0) {
                 $catM = new CategoryModel();
                  if ($catM->removeCategory($categoryId) == true) {
                    echo "REMOVE_SUCCSESS";
        exit();
    }
}
}
}
}
echo "REMOVE_FAILURE";
}
}