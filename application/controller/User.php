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
                    $this->setSession($user);
                    $this->redirect('Home/home');
                } else
                    $this->redirectBack();
            } else
                $this->redirectBack();
        }
    }

    public function setSession($user)
    {
        $_SESSION['loggedIn'] = true;
        $_SESSION['userId'] = $user['id'];
        $_SESSION['userName'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['message'] = "you are logged in!";
        $_SESSION['logIn_time'] = time();
        setcookie($_SESSION['userName'], 'imdb', time() + 3600);
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

                $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
                $token = substr(str_shuffle($data), 0, 8);

                $user->storeUser($_POST, $token);
                $_SESSION['email'] = $_POST['email'];

                $message = '<h3 style="direction: rtl">سلام</h3></br>
                             <h4 style="direction: rtl">!خوش آمدید</h4></br>
                             <h4 style="direction: rtl">   :کد امنیتی </h4>' . $token;

                $this->redirect('User/authentication');

                $response = $this->sendEmail($_POST, $message);
            }
        }
    }

    public function authentication()
    {
        return $this->view('authentication');
    }

     public function enterPassword()
    {
        $userModel = new UserModel();
        $user = $userModel->checkUserExists('email', $_SESSION['email']);
        if ($_POST['authentication'] == $user['token']) {
            $userModel = new UserModel();
            $userModel->updateUser($user['id'], ['status'], ['verified']);
            $this->setSession($user);
            $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
            header("Location: " . $protocol . $_SERVER['HTTP_HOST'] . BASE_DIR . 'Home/home');
        } else
            $this->redirectBack();

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

            if ($checkUser != null)
                $this->redirectBack();
            else {
                $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
                $password = substr(str_shuffle($data), 0, 8);

                $message = '<h3 style="direction: rtl">سلام</h3></br>
                             <h4 style="direction: rtl">رمز شما تغییر یافت :</h4></br>' . $password;

                $this->sendEmail($_POST, $message);
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
                $user->updateUser($_SESSION['userId'], ['password'], [$_POST['newPassword']]);
//                $user->updatePassword($_SESSION['userId'], $_POST['newPassword']);
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
            $mail->Host = "imdbexplorer.ir";
            $mail->SMTPAuth = true;
            $mail->Username = "imdbteam99@imdbexplorer.ir";
            $mail->Password = "123rty789op?";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            $mail->setFrom("imdbteam99@imdbexplorer.ir", "IMDB");
            $mail->addAddress($request['email']);
            $mail->isHTML(true);
            $mail->Subject = "IMDBexplorer";
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