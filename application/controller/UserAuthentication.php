<?php

namespace application\controller;

use application\model\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'system/phpMailer/vendor/autoload.php';

class UserAuthentication extends Controller
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
        $checkLogin = new UserModel();
        if ($checkLogin == false)
            $this->redirectBack();
        else {
            $user = new UserModel();
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
        $checkUser = new UserModel();
        if ($checkUser == false)
            $this->redirectBack();
        else if (strlen($request['password'] < 8))
            $this->redirectBack();
        else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL))
            $this->redirectBack();
        else {
            $user = new UserModel();
            $user->registerStore($request);
            if ($user == false)
                $this->redirectBack();
            else
            {
                $this->sendEmail($request);
                $this->redirect('login');
            }
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
            $checkUser = new UserModel();
            $user = $this->checkAdmin($_SESSION['userId']);
            if ($user != false) {
                if ($user['permission'] != 'admin')
                    $this->redirect('home');
            } else
                $this->redirect('home');
        } else
            $this->redirect('home');
    }

    public function sendEmail($request)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = $request['email'];
            $mail->Password = $request['password'];
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            $mail->setFrom("admin@gmail.com", "imdb");
            $mail->addAddress($request['email']);
            $mail->isHTML(true);
            $mail->Subject = "authentication";
            $mail->Body = "You already have an account with imdb.";

            $mail->send();
            echo "ok";
        } catch (Exception $e) {
            echo "no";
        }

    }
}