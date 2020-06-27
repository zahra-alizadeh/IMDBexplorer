<?php


namespace application\model;


class PersonModel extends Model
{
    // get biography of person
    public function getActorBio($actorId)
    {
        $query = "SELECT * FROM `actors` WHERE $actorId = ? ";
        $result = $this->query($query, array($actorId))->fetchAll();
        $this->closeConnection();
        return $result;
    }
    public function getDirectorBio($directorId)
    {
        $query = "SELECT * FROM `directors` WHERE $directorId = ? ";
        $result = $this->query($query, array($directorId))->fetchAll();
        $this->closeConnection();
        return $result;
    }

}