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

    // get biography of person
    public function actorDetails()
    {
        $personModel = new PersonModel();
        $actor = $personModel->getActor('1');
//        var_dump($actor);
        $actor=$actor[0];
        return $this->view('celebrity-single', compact('actor'));
    }

    public function directorDetails($directorId)
    {
        $personModel = new PersonModel();
        $director = $personModel->getDirector($directorId);
        return $this->view('celebrity-single', compact('director'));
    }
}