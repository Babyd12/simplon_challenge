<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
   
    <nav>
        <ul class="menu">
          <li><a href="#!">Home</a></li>
          <li><a href="#!">About</a></li>
          <li><a href="#!">Contact</a></li>
          <li><a href="admin_bord/bord.php">Admin Board</a></li>
        </ul>
      </nav>

    <?php 
    session_start();

    if(!isset($_SESSION['userActif'])   ){
        header('location:login.php');

    }else if(isset($_SESSION['userActif']) &&  $_SESSION['welcome'] ==   true){
        if(isset($_SESSION['welcome']) && $_SESSION['welcome'] ==true){
            echo "          <div class='msgError> 
            <p>Bienvenu </p>. 
       </div>";
       $_SESSION['welcome'] = false;
       die();
        }
    }else{
        echo 'rediriger vers le dashbord'; die();
        header('location: index.php?');
    }
    ?>

</body>


</html>