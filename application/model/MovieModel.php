<?php


namespace application\model;


class MovieModel extends Model
{
    public function mostPopularMovies()
    {
        $query = "SELECT * FROM `movies` ; ";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }

    public function movies()
    {
        $query = "SELECT * FROM `movies`; ";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }
}
