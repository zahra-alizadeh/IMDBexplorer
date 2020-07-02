<?php


namespace application\controller;

require 'application/model/Model.php';
require 'application/model/PersonModel.php';

use application\model\PersonModel;

class Director extends Controller
{
    public function show()
    {
        $this->view('director-single');
    }
    public function director()
    {
        $personModel = new PersonModel();
        $director = $personModel->getDirector('1');
        $director = $director[0];

        $personModel = new PersonModel();
        $directorPictures = $personModel->getDirectorPicture('1');

//        $movieModel = new PersonModel();
//        $directorMovies = $movieModel->getActorMovies('1');

        return $this->view('director-single', compact('director', 'directorPictures'));
    }
}