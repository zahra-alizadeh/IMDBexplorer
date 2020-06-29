<?php


namespace application\controller;
require 'application/model/Model.php';
require 'application/model/PersonModel.php';

use application\model\PersonModel;

class Person extends Controller
{

    public function show()
    {
        $this->view('celebrity-single');
    }

    public function actors()
    {
        $actorModel = new PersonModel();
        $actors = $actorModel->all('actors');
        return $this->view('', compact('actors'));
    }

    public function actor()
    {
        $this->actorDetails();
        $this->actorPictures();
        $this->actorMovie();
    }

    // get biography of person
    public function actorDetails()
    {
        $personModel = new PersonModel();
        $actor = $personModel->getActor('1');
        $actor = $actor[0];
//        var_dump($actor);
        return $this->view('celebrity-single', compact('actor'));
    }

    public function actorPictures()
    {
        $personModel = new PersonModel();
        $actorPictures = $personModel->getActorPicture('1');
        $actorPictures = $actorPictures[0];
//        var_dump($actorPictures);
        return $this->view('celebrity-single', compact('actorPictures'));
    }

    public function directorDetails($directorId)
    {
        $personModel = new PersonModel();
        $director = $personModel->getDirector($directorId);
        return $this->view('celebrity-single', compact('director'));
    }

    public function actorMovie()
    {
        $movieModel = new PersonModel();
        $actorMovies = $movieModel->getActorMovies('1');
        $actorMovies = $actorMovies[0];
//        var_dump($actorMovies);
        return $this->view('celebrity-single', compact('actorMovies'));
    }
}