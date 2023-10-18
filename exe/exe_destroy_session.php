<?php 

    if(isset($_GET['sess'])){
        session_destroy();
        header('location: ../index.php');
    }

?>