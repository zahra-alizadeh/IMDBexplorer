<?php

namespace application\controller;

require_once 'application/model/UserModel.php';

use application\model\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'system/phpMailer/vendor/autoload.php';

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

    public function userLogin()
    {
        if (empty($_POST['username']) || empty($_POST['password']))
            $this->redirectBack();
        else {
            $userModel = new UserModel();
            $user = $userModel->checkUserExists('username', $_POST['username']);
            if ($user != null) {
                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['userName'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['message'] = "you are logged in!";
                    $_SESSION['logIn_time'] = time();
                    setcookie($_SESSION['userName'], 'imdb', time() + 3600);
                    $this->redirect('Home/home');
                } else
                    $this->redirectBack();
            } else
                $this->redirectBack();
        }
    }

    public function isLoginSessionExpired()
    {
        $login_session_duration = 20;
        $current_time = time();
        if (isset($_SESSION['logIn_time']) and isset($_SESSION["userId"])) {
            if (((time() - $_SESSION['logIn_time']) > $login_session_duration)) {
                return true;
            }
        }
        return false;
    }

    public function header()
    {
        $userModel = new UserModel();
        $user = $userModel->checkUserExists('username', $_POST['username']);
        return $this->view('header', compact('user'));
    }

    public function registration()
    {
        return $this->view('register');
    }

    public function register()
    {
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['repeatPassword']))
            $this->redirectBack();
        else if (strlen($_POST['password'] <= 8))
            $this->redirectBack();
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            $this->redirectBack();
        else if ($_POST['password'] != $_POST['repeatPassword'])
            $this->redirectBack();
        else {
            $user = new UserModel();
            $checkUser = $user->checkUserExists('email', $_POST['email']);

            if ($checkUser != null)
                $this->redirectBack();
            else {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $token = md5(rand(10, 100));
                $user->storeUser($_POST, $token);
                if ($checkUser)
                    $this->redirectBack();
                else {
                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $token = md5(rand(10, 100));
                    $user->storeUser($_POST, $token);

                    $message = '<!DOCTYPE html>
                <body><a href="http://localhost/IMDB/Home/home?token=' . $token . '">"برای تایید حساب کاربری خود اینجا کلیک کنید!</a></body>';
                    $b = $this->sendEmail($_POST, $message);
                    if ($b)
                        $this->redirect('Home/home');

                }
            }
        }
    }

    public function forgetPassword()
    {
        return $this->view('forgot-password');
    }

    public function forgetUserPassword()
    {
        if (empty($_POST['email']))
            $this->redirectBack();
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            $this->redirectBack();
        else {
            $user = new UserModel();
            $checkUser = $user->checkUserExists('email', $_POST['email']);

            if ($checkUser)
                $this->redirectBack();
            else {
                $token = md5(rand(10, 100));

                $message = '<!DOCTYPE html>
                <body>
                <a href="http://localhost/IMDB/Home/home?token=' . $token . '">برای تغییر کلمه عبور خود اینجا کلیک کنید!</a>
                </body>';
                $b = $this->sendEmail($_POST, $message);
                if ($b)
                    $this->redirect('Home/home');
            }
        }
    }

    public function changePassword()
    {
        return $this->view('change-password');
    }

    public function changeUserPassword()
    {
        if (empty($_POST['currentPassword']) || empty($_POST['newPassword']) || empty($_POST['repeatNewPassword']))
            $this->redirectBack();
        else if (strlen($_POST['newPassword'] <= 8))
            $this->redirectBack();
        else if ($_POST['newPassword'] != $_POST['repeatNewPassword'])
            $this->redirectBack();
        else {
            $user = new UserModel();
            $checkUser = $user->checkUserExists('id', $_SESSION['userId']);

            if ($checkUser == null)
                $this->redirectBack();
            else {
                $_POST['newPassword'] = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                $user->updatePassword($_SESSION['userId'], $_POST['newPassword']);
                $this->redirectBack();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['userId'])) {
            setcookie($_SESSION['userName'], '', time() - 3600);
            unset($_SESSION['userId']);
            unset($_SESSION['email']);
            unset($_SESSION['userName']);
            unset($_SESSION['loggedIn']);
            unset($_SESSION['message']);

            session_destroy();
        }

        $this->redirect('Home/home');
    }

    public function checkAdmin()
    {
        if (isset($_SESSION['userId'])) {
            $checkUser = new UserModel();
            $user = $checkUser->checkUserExists('email', $_POST['email']);
//            $user = $this->checkAdmin($_SESSION['userId']);
            if ($user != false) {
                if ($user['permission'] != 'admin')
                    $this->redirect('Home/home');
            } else
                $this->redirect('Home/home');
        } else
            $this->redirect('Home/home');
    }

    // send email for user to authentication

    public function sendEmail($request, $message)
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
            $mail->Username = "";
            $mail->Password = "";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            $mail->setFrom("", "IMDB");
            $mail->addAddress($request['email']);
            $mail->isHTML(true);
            $mail->Subject = "فعال سازی حساب کاربری";
            $mail->Body = $message;

            $mail->send();
            echo "ok";
            return true;
        } catch (Exception $e) {
            echo "no" . $e->getMessage();
            return false;
        }
    }
}