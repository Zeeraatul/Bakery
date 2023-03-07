<?php


namespace MyApp;


class UsersModel extends DBContext
{
    public function __construct()
    {
        parent::__construct("users");         //вызов конструктора базового класса
    }

    public function getUser($email, $password)
    {
        $users = $this->getManyRows([
            'email' => $email,
            'password' => $password
        ]);
        return count($users) == 1 ? $users[0] : null;
    }
}