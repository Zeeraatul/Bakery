<?php


namespace MyApp;


class ConfigController extends Controller
{
    public function index()
    {

    }

    public function getAllOptions()
    {
        if ($this->userAuth->isAuth()) {
            AdminView::Render(ADM_PAGES_PATH . 'allOptions' . EXT, $this->data);
            return;
        } else {
            $this->login();
        }
    }

    public function updateOption()
    {
        if ($this->userAuth->isAuth()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['value']) && isset($_POST['group'])) {
                    $id = intval(htmlspecialchars(trim($_POST['id'])));
                    $name = htmlspecialchars(trim($_POST['name']));
                    $value = htmlspecialchars(trim($_POST['value']));
                    $group = htmlspecialchars(trim($_POST['group']));

                    $optM = new OptionsModel();
                    if ($optM->updateOption($id, $name, $value, $group) == true) {
                        $this->data['success'] = "Данные обновлены";
                        $this->formatOptions();
                    } else {
                        $this->data['error'] = "Возникла ошибка. Данные не обновлены. ";
                    }
                    $this->getAllOptions();
                    return;
                }
            }
        } else {
            $this->login();
        }
    }

    public function removeOption()
    {
        if ($this->userAuth->isAuth()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['removeId'])) {
                    $optionId = intval($_POST['removeId']);
                    if ($optionId > 0) {
                        $optM = new OptionsModel();
                        if ($optM->removeOption($optionId) == true) {
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