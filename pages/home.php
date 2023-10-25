<?php session_start();

 ?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Animated Image Gallery | CodingLab </title>
    <link rel="stylesheet" href="../ressources/css/tache.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   </head>
<body>
<?php 
        if(!isset($_SESSION['userActif']) ){
        
            $_SESSION['welcome'] = false;
            header('location:../login.php');
        }
        else{
            if( isset($_SESSION['welcome']) && $_SESSION['welcome'] == true){
                echo " 
                     <h1 style='position:absolute; display:flex; flex-direction:column;  margin:0 auto; font-size: 10vh; color:black;'>Bienvenu ".$_SESSION["nomUserActif"]."  </h1>
                   ";
                //unset($_SESSION['welcome']);
  
            }
                        
          }
  ?>

  <form action="../exe/exe_logout.php" method="get">
    <!-- <input type="submit" value="Déconnexion" name="logoutMe" style="float:left; position:relative; margin-bottom:650px; left:289px;"> -->
    <button type="submit" class="button" name="logoutMe" style="--clr:#39FF14;  position:absolute; top: 6%; left:10%;"><span>Deconexion</span><i></i></button>
  </form>
  <div class="container">

    <input type="radio" name="s" id="home" checked>
    <input type="radio" name="s" id="blog">
    <input type="radio" name="s" id="code">
    <input type="radio" name="s" id="help">
    <input type="radio" name="s" id="about">
    <nav>
      <div class="slider"></div>
      <label class="home" for="home">
      <i class="fas fa-home"></i></i><a href="home.php">Home </a>
      </label>
      <label class="blog" for="blog">
        <i class="fas fa-tasks"></i> </i><a href="tache.php">Tâches </a>
      </label>
      <!-- <label class="code" for="code">
        <i class="fas fa-code"></i>Code
      </label> -->
      <label class="help" for="help">
        <i class="fas fa-envelope"></i>Message
      </label>
      <label class="about" for="about">
        <i class="fas fa-user"></i><a href="">About </a>
      </label>
    </nav>

  </div>



  
  
</body>
</html>