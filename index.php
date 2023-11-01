
<?php
session_start();
require 'utile.php';

if (isset($_SESSION['userActif'])){
   
        header('location:App/View/Pages/dashboard.php');
} else {

        header('location: App/View/Auth/login.php');
}

