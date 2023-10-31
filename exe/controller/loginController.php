<?php

session_start();
require '../exe_login.php'; 

$loginController = new LoginController();
$loginController->processLoginForm();
