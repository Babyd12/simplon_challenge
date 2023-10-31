<?php
// 
// define('ROOT', dirname(__DIR__));
require ROOT.'\App\App.php';
App::load();
// $app = App::getInstance();
// $lines = $app->Database->showAllInTables('users');

if(isset($_GET['page'])){
    $pqge = $_GET['page'] ;
}else{
    $page  = 'home';
}



