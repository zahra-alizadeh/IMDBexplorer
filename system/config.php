<?php

define('APP_NAME','IMDB');
define("BASE_URL","http://imdbexplorer.ir/");
define("BASE_DIR","/");

// $tmp = explode('/', $_SERVER['REQUEST_URI']);
// define('CURRENT_ROUTE', $tmp);

$tmp = explode('?', $_SERVER['REQUEST_URI']);
$tmp1 = explode('/', $tmp[0]);
define(CURRENT_ROUTE,$tmp1);

define('DB_HOST','localhost:3306');
define('DB_NAME','imdbexpl_imdb');
define('DB_USERNAME','imdbexpl_admin');
define('DB_PASSWORD','123rty789op?');