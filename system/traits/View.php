<?php


namespace system\traits;


trait View
{
    // this method is for access to views and send objects
    protected function view($dir, $variables = null)
    {
        $dir = str_replace('.', '/', $dir);
        if ($variables != null)
            extract($variables);

        // view path
        $path = realpath(dirname(__FILE__) . "/../../application/view/" . $dir . ".php");
        if (file_exists($path))
            return require_once($path);
        else
            echo "this view " . $dir . " not exists!";
    }

}