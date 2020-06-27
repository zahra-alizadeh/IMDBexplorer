<?php


namespace application\controller;

use application\model\PersonModel;

class Person extends Controller
{
    // get biography of person
    public function actorBio($actorId)
    {
        $personModel = new PersonModel();
        $bio = $personModel->getActorBio($actorId);
        return $this->view('actor&director', compact('bio'));
    }

    public function directorBio($directorId)
    {
        $personModel = new PersonModel();
        $bio = $personModel->getDirectorBio($directorId);
        return $this->view('director', compact('bio'));
    }

}