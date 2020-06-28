<?php


namespace application\controller;

use application\model\PersonModel;

class Person extends Controller
{


    public function directorBio($directorId)
    {
        $personModel = new PersonModel();
        $bio = $personModel->getDirectorBio($directorId);
        return $this->view('director', compact('bio'));
    }

}