<?php
// 
// define('ROOT', dirname(__DIR__));
require '../App/App.php';

require  require dirname(__DIR__)  . '   \App\\Config\config.php';

$app = App::getInstance();

$db = $app->getDB();

$db -> showAllInTables('users');;

var_dump($db);




if(isset($_GET['page'])){
    $pqge = $_GET['page'] ;
}else{
    $page  = 'home';
}

ob_start();

$content = ob_get_clean();




