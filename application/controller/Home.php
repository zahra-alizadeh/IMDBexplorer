<?php

namespace application\controller;

require 'application/model/Model.php';
require 'application/model/MovieModel.php';

use application\model\MovieModel;

class Home extends Controller
{
    public function home()
    {
        $movieModel = new MovieModel();
        $movies = $movieModel->movies();

        return $this->view('index_light', compact('movies'));
    }

    public function allPopularMovies()
    {
        $movieModel = new MovieModel();
        $movies = $movieModel->mostPopularMovies();

        return $this->view('moviegridfw_light', compact('movies'));
    }

}