<?php

require dirname(dirname(__DIR__)) .DIRECTORY_SEPARATOR. 'utile.php';
require ROOT.DS.'App' .DS.'Autoloader.php';
$authController = new Controller();

$page= isset($_GET["page"]) ? $_GET["page"]:"login";
switch($page){

    case 'login': include 'App/View/Auth/login.php'; 
        break;

    case 'auth': $authController->authController();
        break;

    case 'logout': $authController->logout();
        break;

    default: die("Invalid page");

}
