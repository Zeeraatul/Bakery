<?php


namespace MyApp;


class MessagesModel extends DBContext
{
    public function __construct()
    {
        parent::__construct("messages");         //вызов конструктора базового класса
    }
    public function saveMessage($fio, $email, $subject, $message) {
        return $this->addOneRow([
            'fio' => $fio,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ]) == 1;
    }
}