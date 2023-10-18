<?php 

    if(isset($_GET['sess'])){
        
        $_SESSION = array();
        session_destroy();
        header('location: ../index.php');
    }

?>