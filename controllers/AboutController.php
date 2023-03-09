<?php


namespace MyApp;


class AboutController extends Controller
{

    public function index()
    {
        View::Render( PAGES_PATH.'about'.EXT, $this->data);
    }
    public function contactus()
    {
        View::Render( PAGES_PATH.'contactus'.EXT, $this->data);
    }
    public function getClientMessage() {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            //varSuperDump($_POST);
                if(isset($_POST['fio']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {

                    $fio = htmlspecialchars(trim($_POST['fio']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $subject = htmlspecialchars(trim($_POST['subject']));
                    $message = htmlspecialchars(trim($_POST['message']));

                    // ВАЛИДАЦИЯ !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    if(true) {
                        $messageM = new MessagesModel();
                        if($messageM->saveMessage($fio, $email, $subject, $message)) {
                            $this->data['success'] = "Сообщение было отправлено. Оно будет проработано в ближайшее время";
                            $this->contactus();
                        }
                    }
                }
        }
    }
}

/*
 * 1. Валидация (2 ступени: Js + PHP)
 * 2. Предложить/реализовать/оптимизировать блок с хлебными крошками  -- Page Header
 */