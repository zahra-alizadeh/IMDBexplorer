<?php


namespace application\controller;


class Movie extends Controller
{
    public function movie()
    {
//        $this->view('moviegridfw_light');
        $this->view('moviesingle_light');
    }
}