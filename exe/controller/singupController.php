<?php
session_start();
require '../exe_singup.php'; 

$loginController = new SingupControlle();
$loginController->processSingupForm();