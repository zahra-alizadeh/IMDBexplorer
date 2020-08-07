<?php


namespace application\controller;
require_once 'application/model/Model.php';
require_once 'application/model/MovieModel.php';

use application\model\Model;
use application\model\MovieModel;

class Movie extends Controller
{
    public function movies()
    {
        $numberOfRows = new Model();
        $count = $numberOfRows->numberOfRows('movies');
        $count = $count[0]['COUNT(`id`)'] % 12;
        $count == 0 ? $pageNum = $count[0]['COUNT(`id`)'] / 12 : $pageNum = ($count[0]['COUNT(`id`)'] / 12) + 1;
        $pageNum++;

        $arr = explode('/', CURRENT_ROUTE);

        $movieModel = new MovieModel();

        if (sizeof($arr) > 2)
            $movies = $movieModel->all('movies', 12 * ($arr[2] - 1) + 1, 12);

        else
            $movies = $movieModel->all('movies');

        return $this->view('moviegridfw_light', compact('movies', 'pageNum'));
    }

    public function movie($id)
    {
        $movieModel = new MovieModel();
        $movie = $movieModel->getMovie($id[1]);
        $movie = $movie[0];

        $movieModel = new MovieModel();
        $moviePics = $movieModel->getMoviePics($id[1]);

        $movieModel = new MovieModel();
        $movieComments = $movieModel->getMovieComments($id[1]);

        $movieModel = new MovieModel();
        $movieStars = $movieModel->getMovieStars($id[1]);

        $movieModel = new MovieModel();
        $movieGenres = $movieModel->getMovieGenre($id[1]);

        return $this->view('moviesingle_light', compact('movie', 'moviePics', 'movieComments', 'movieStars', 'movieGenres'));
    }

    public function watchList()
    {
        return $this->view('watchList');
    }

    public function add2WatchList($movieId)
    {
        $movieModel = new MovieModel();
        $result = $movieModel->storeMovie($movieId[1], $_SESSION['userId']);

        if ($result == true)
            $this->redirectBack();
    }

    public function addComment($MovieId)
    {
        $arr = explode('/', CURRENT_ROUTE);
        $movieId = $arr[2];

        $movieModel = new MovieModel();
        $movieModel->storeComment($_SESSION['userId'], $movieId[1], $_POST['title'], $_POST['text']);

        $this->redirectBack();
    }

}