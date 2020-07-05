<?php


namespace application\controller;
require 'application/model/Model.php';
require 'application/model/PersonModel.php';

use application\model\PersonModel;

class Person extends Controller
{
    public function actor()
    {
        $personModel = new PersonModel();
        $actor = $personModel->getActor('1');
        $actor = $actor[0];

        $personModel = new PersonModel();
        $actorPictures = $personModel->getActorPicture('1');

        $movieModel = new PersonModel();
        $actorMovies = $movieModel->getActorMovies('1');

        return $this->view('celebrity-single', compact('actor', 'actorPictures', 'actorMovies'));
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