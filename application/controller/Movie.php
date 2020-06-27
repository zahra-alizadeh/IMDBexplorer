<?php


namespace application\controller;


class Movie extends Controller
{
    public function movie()
    {
        $this->view('moviesingle_light');
    }
}