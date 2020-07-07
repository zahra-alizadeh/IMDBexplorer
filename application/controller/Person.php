<?php


namespace application\controller;
require 'application/model/Model.php';
require 'application/model/PersonModel.php';

use application\model\PersonModel;

class Person extends Controller
{
    // get all actors
    public function actors()
    {
        $personModel = new PersonModel();
        $actors = $personModel->all('actors');

//        var_dump($actors);

        return $this->view('celebrity-grid', compact('actors'));
    }

    // get actor information such as name, picture and ...
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

    // get director information such as name, picture and ...
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