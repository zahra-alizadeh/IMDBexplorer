<?php


namespace application\controller;
require_once 'application/model/Model.php';
require_once 'application/model/BlogModel.php';

use application\model\BlogModel;
use application\model\Model;

class Blog extends Controller
{
    public function blogs()
    {
        $numberOfRows = new Model();
        $count = $numberOfRows->numberOfRows('blogs');
        $count = $count[0]['COUNT(`id`)'] % 10;

        $count == 0 ? $pageNum = $count[0]['COUNT(`id`)'] / 10 : $pageNum = ($count[0]['COUNT(`id`)'] / 10) + 1;

        $arr = explode('/', CURRENT_ROUTE);

        $blogModel = new BlogModel();
        if (sizeof($arr) > 2)
            $blogs = $blogModel->all(10 * ($arr[2] - 1) + 1, 10);

        else
            $blogs = $blogModel->all();

        return $this->view('bloglist_light', compact('blogs','pageNum'));
    }

}