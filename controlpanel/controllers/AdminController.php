<?php


namespace MyApp {

    class AdminController extends Controller
    {
        public function index()
        {
            if ($this->userAuth->isAuth()) {
                AdminView::Render(ADM_PAGES_PATH . 'adminindex' . EXT, $this->data);
                return;
            } else {
                $this->login();
            }
        }

        public function login()
        {
            AdminView::Render(ADM_PAGES_PATH . 'login' . EXT, $this->data, ADM_VIEWS_PATH . 'noAuthTemplateView' . EXT);
        }

        public function register()
        {
            AdminView::Render(ADM_PAGES_PATH . 'register' . EXT, $this->data, ADM_VIEWS_PATH . 'noAuthTemplateView' . EXT);
        }

        public function forgotpassword()
        {
            AdminView::Render(ADM_PAGES_PATH . 'recovery' . EXT, $this->data, ADM_VIEWS_PATH . 'noAuthTemplateView' . EXT);
        }

        public function checkUser()
        {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                if (isset($_POST['email']) && isset($_POST['password'])) {

                    //Валидация !!!!!!!!!!!!!!!!!!!!!!
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));
                    $password = hash("sha256", $password);
                    if($this->userAuth->isUserValid($email, $password)) {
                        $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                        $_SESSION['userID'] = $this->userAuth->getUserInfo()["Id"];
                        $_SESSION['login'] = $this->userAuth->getUserInfo()["login"];

                        header('Location: /controlpanel/admin/index');
                        exit;
                    }
                }
            }
            $this->data['error'] = "Попытка Входа не успешна";
            $this->login();
        }

        public function logout(){
            unset($_SESSION['IP']);
            unset($_SESSION['userID']);
            session_destroy();
            $this->login();
        }
    }
}