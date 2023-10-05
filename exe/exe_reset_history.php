<?php
session_start();

if(isset($_GET['reset_action']) && empty($_GET['amound']) && isset($_SESSION['history'])){
    
    session_unset();
    header("Location: " .$_SERVER['HTTP_REFERER'] );
}else{
    header("Location: " .$_SERVER['HTTP_REFERER'] );
}

?>