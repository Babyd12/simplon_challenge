<?php session_start(); 
include '../../../utile.php';
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form |</title> 
     <link rel="stylesheet" href="Public/css/login.css"> 
    <link rel="stylesheet" href="../../../Public/css/login.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="../../Route/Route.php?page=auth" method="get">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email or Phone" name = "email" >
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" >
          </div>
          <p><?php ( isset($_SESSION['errorArray']) ?  browse($_SESSION['errorArray']) : '' ); $_SESSION['errorArray'] = []?>   </p>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" value="auth" name="page">
          </div>
          <div class="signup-link">Not a member? <a href="#">Signup now</a></div>
       
        </form>
      </div>
    </div>

  </body>
</html>

