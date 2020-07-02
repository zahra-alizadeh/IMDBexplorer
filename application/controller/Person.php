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
        $personModel = new PersonModel();
        $actor = $personModel->getActor('1');
        $actor = $actor[0];

        $personModel = new PersonModel();
        $actorPictures = $personModel->getActorPicture('1');

        $movieModel = new PersonModel();
        $actorMovies = $movieModel->getActorMovies('1');

        return $this->view('celebrity-single', compact('actor', 'actorPictures', 'actorMovies'));
    }



}