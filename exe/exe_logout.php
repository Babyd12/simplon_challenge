<?php
session_start();

if(isset($_GET['logoutMe'])){
   
    $_SESSION = array();
    unset($_SESSION['userActif']);
    header('location: ../index.php');
}else{
  echo 'pas recu'; 
}

?>