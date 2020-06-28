<?php


namespace application\model;


class PersonModel extends Model
{
    public function all($tableName)
    {
        $query = "SELECT * FROM " . $tableName . "; ";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }

    // get biography of person
    public function getActor($actorId)
    {
        $query = "SELECT * FROM `actors` WHERE id = ? ";
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