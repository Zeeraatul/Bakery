<?php


namespace MyApp;


class UserAuthentication
{
    private $currentUser = null;

    public function isAuth()
    {
        if (isset($_SESSION['IP']) && isset($_SESSION['userID']) && isset($_SESSION['login'])) {
            return true;
        } else {
            return false;
        }
    }

    public function isUserValid($email, $password)
    {
        $userM = new UsersModel();
        $this->currentUser = $userM->getUser($email, $password);
        return is_null($this->currentUser) ? false : true;
    }

    public function getUserInfo()
    {
        return $this->currentUser;
    }
}