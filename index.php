<?php

include('system/config.php');
include(__DIR__ . '/system/router/Routing.php');
include('system/traits/Redirect.php');
include('system/traits/View.php');
include('application/controller/Controller.php');
include('application/controller/Home.php');
include('system/bootstrap/boot.php');

//include ('application/model/CreateDB.php');
//use application\model\CreateDB;
//
//$db = new CreateDB();
//$db->run();


// $tmp = preg_split ("/\?,//", $_SERVER['REQUEST_URI']);
// var_dump($tmp);
// echo "hello"."</br>";
// $tmp1 = explode('/',$tmp[0]);
// var_dump($tmp1);
// echo "hello1"."</br>";
// $CURRENT_ROUTE=$tmp1[0];
// var_dump(CURRENT_ROUTE);


// $tmp = explode('?', $_SERVER['REQUEST_URI']);
// $tmp1 = explode('/', $tmp[0]);
// define(CU,$tmp1);
// var_dump(CU);