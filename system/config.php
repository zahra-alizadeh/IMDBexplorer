<?php

$BASE_URL = "http://localhost/IMDB/";
$BASE_DIR = "/IMDB/";

$tmp = explode('?', $_SERVER['REQUEST_URI']);
$CURRENT_ROUTE = str_replace($BASE_DIR,'',$tmp[0]);
unset($tmp);

//define('APP_NAME','IMDB');
//define("BASE_URL","http://localhost/IMDB/");
//define("BASE_DIR","/IMDB/");
//
//$temporary = explode('?', $_SERVER['REQUEST_URI']);
//$currentRoute = str_replace(BASE_DIR,'',$temporary[0]);
//
//define('CURRENT_ROUTE', $currentRoute);
//
//$dbHost = 'localhost';
//$dbName = 'mvc_blog';
//$dbUsername = 'root';
//$dbPassword = '';

