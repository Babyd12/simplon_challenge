<h1>Boncour tout le monde</h1>
<?php
use Core\Auth;
use Core\Auth\DBAuth;

// define('ROOT', dirname(__DIR__));
require ROOT.'\App\App.php';

App::load();

//auth 
$app =App::getInstance();
$auth = new BDAuth($app->getDatabase());

if($auth -> logged()){
    $app -> forbidend();
}

