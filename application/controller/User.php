<?php


namespace application\controller;

use application\model\UserAuthentication;

class User extends Controller
{
    function __construct()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
    }

    public function login()
    {
        return $this->view('login');
    }

    public function userLogin($request)
    {
        $checkLogin = new UserAuthentication();
        if ($checkLogin == false)
            $this->redirectBack();
        else {
            $user = new UserAuthentication();
            if ($user == true) {
                if (password_verify($request['password'], $user['password'])) {
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['userId'] = $user['userName'];
                    setcookie($_SESSION['userName'], 'imdb', time() + 3600);
                    $this->redirect('main-page');
                } else
                    $this->redirectBack();
            } else
                $this->redirectBack();
        }
    }

    public function register()
    {
        return $this->view('register');
    }

    public function userRegister($request)
    {
        $checkUser = new UserAuthentication();
        if ($checkUser == false)
            $this->redirectBack();
        else if (strlen($request['password'] < 8))
            $this->redirectBack();
        else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL))
            $this->redirectBack();
        else {
            $user = new UserAuthentication();
            $user->registerStore($request);

            if ($user == false)
                $this->redirectBack();
            else
                $this->redirect('login');
        }
    }

    public function logout($request)
    {
        if (isset($_SESSION['userId'])) {
            unset($_SESSION['userId']);
            session_destroy();
        }
        $this->redirectBack();
        setcookie($_SESSION['userName'], '', time() - 3600);
    }

    public function checkAdmin()
    {
        if (isset($_SESSION['userId'])) {
            $checkUser = new UserAuthentication();
            $user = $this->checkAdmin($_SESSION['userId']);
            if ($user != false) {
                if ($user['permission'] != 'admin')
                    $this->redirect('home');
            } else
                $this->redirect('home');
        } else
            $this->redirect('home');
    }
}