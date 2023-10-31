<?php
namespace App;

require_once __DIR__ . '/../App/App.php';

App::load();
if(isset($_GET['page'])){
    $page = $_GET['page'] ;
}else{
    $page  = '';
}


//auth 

$app = App::getInstance();
$auth = new BDAuth($app ->getDatabase());

if($auth->logged()){
    $app -> forbidend();
}

ob_start();
// if($page == 'home'){
//     require ROOT . '/pages/admin/post/index.php';
// } elseif($page == 'tache'){
//     require ROOT . '/pages/user/post/tache.php';
// } elseif($page == 'logout'){
//     require ROOT . '/pages/user/post/logout.php';
// }else{
//     echo 'nothings';
// }
// $content = ob_get_clean();
// require ROOT . '/pages/user/index.php';
