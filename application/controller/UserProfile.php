<?php


namespace application\controller;

require_once 'application/model/UserModel.php';

use application\model\Model;
use application\model\MovieModel;
use application\model\UserModel;

class UserProfile extends Controller
{
    public function profile()
    {
        $user = new UserModel();
        $userProfile = $user->checkUserExists('id', $_SESSION['userId']);
        return $this->view('profile', compact('userProfile'));
    }

    public function editProfile()
    {
        $userModel = new UserModel();
        $userModel->updateUserProfile($_SESSION['userId'],$_POST);
        $user = new UserModel();
        $userProfile = $user->checkUserExists('id', $_SESSION['userId']);
        return $this->view('profile', compact('userProfile'));
    }

    public function watchlist()
    {
        $numberOfRows = new MovieModel();
        $count = $numberOfRows->watchlistNumberOfRows($_SESSION['userId']);
        $totalNumberOfMovies = $count[0]['COUNT(`movie_id`)'];
        $count = $count[0]['COUNT(`movie_id`)'] % 10;

        $count == 0 ? $pageNum = $totalNumberOfMovies / 10 : $pageNum = ($totalNumberOfMovies / 10) + 1;

        $arr = explode('/', CURRENT_ROUTE);

        $movieModel = new MovieModel();
        if (sizeof($arr) > 2)
            $watchlist = $movieModel->favoriteMovies($_SESSION['userId'], 10 * ($arr[2] - 1) + 1, 10);

        else
            $watchlist = $movieModel->favoriteMovies($_SESSION['userId']);

        return $this->view('user-favorite-list', compact('watchlist', 'count'));
    }
}