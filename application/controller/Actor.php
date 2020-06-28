<?php

namespace application\controller;
require 'application/model/Model.php';
require 'application/model/PersonModel.php';

use application\model\PersonModel;


class Actor extends Controller
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
        return $this->view('celebrity-single', compact('actor'));
    }

}