<?php

namespace application\controller;
require 'application/model/Model.php';
require 'application/model/UserModel.php';

use application\model\Model;
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

    public function userLogin()
    {
        if (empty($_POST['username']) || empty($_POST['password']))
            $this->redirectBack();

        else {

            $userModel = new UserModel();
            $user = $userModel->checkUserNameExists($_POST);
            if ($user != null) {
                $this->redirect('Home/home');
                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['userName'] = $user['userName'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['message'] = "you are logged in!";
                    setcookie($_SESSION['userName'], 'imdb', time() + 3600);
                    $this->redirect('Home/home');
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

    public function userRegister()
    {
        if (empty($_POST['email']) || empty($_POST['password']))
            $this->redirectBack();
        else if (strlen($_POST['password'] <= 4))
            $this->redirectBack();
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            $this->redirectBack();
        else {
            $user = new UserModel();
            $checkUser = $user->checkUserExists($_POST);

            if ($checkUser == false)
                $this->redirectBack();
            else {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

//                $this->sendEmail($_POST);
                $user->storeUser($_POST);
                $this->redirect('Home/home');
            }
        }
    }

    public function forgetPassword()
    {
        return $this->view('forgot-password');

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

    // send email for user to authentication
    public function sendEmail($request)
    {
        var_dump($request);
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
            $mail->Username = "imdb.team99@gmail.com";
            $mail->Password = "imdb1234";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            $mail->setFrom("imdb.team99@gmail.com", "imdb");
            $mail->addAddress($request['email']);
            $mail->isHTML(true);
            $mail->Subject = "authentication";
            $mail->Body = "You already have an account with imdb.";

            $mail->send();
            echo "ok";
        } catch (Exception $e) {
            echo "no" . $e->getMessage();
        }

    }
}