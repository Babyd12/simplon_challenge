
<?php session_start(); ?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <meta charset="utf-8">
   <title>Project Management</title> 
    <link rel="stylesheet" href="css/project.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

    <div class="wrapper">
      <input type="checkbox" id="btn" hidden>
      <label for="btn" class="menu-btn">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times"></i>
      </label>
      <nav id="sidebar">
        <div class="title">Side Menu</div>
        <ul class="list-items">
          <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
          <li><a href="add_project.php"><i class="fas fa-sliders-h"></i>Add Project</a></li>
          <li><a href="add_activite.php"><i class="fas fa-address-book"></i>Add activity</a></li>
            <li><a href="#"><i class="fas fa-cog"></i>Settings</a></li>
          <li><a href="#"><i class="fas fa-stream"></i>Features</a></li>
          <li><a href="#"><i class="fas fa-user"></i>About us</a></li>
          <li><a href="#"><i class="fas fa-globe-asia"></i>Languages</a></li>
          <li><a href="#"><i class="fas fa-envelope"></i>Contact us</a></li>
          <div class="icons">
           <!-- <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a> -->
            <a href="#"><i class="fab fa-github"></i></a>
          </div>
        </ul>
      </nav>
    </div>

    <div class="container">
      <div class="content">
        <div class="left-side">
            
        </div>
        <div class="right-side">
          <div class="topic-text">Enregistrer Une activité à un projet</div>
          <?php  
              if(!empty($_SESSION['errorsArray'])){
                foreach($_SESSION['errorsArray'] as $error_msg){
                  echo '<div class="topic-text" style = "color:black;font-size:20px;">' .$error_msg. '</div>';
                
                }
              }
            ?>

        <form action="exe/exe_add_project.php">
          <div class="input-box">
            <select>
              <option selected value="0">Pure CSS Select</option>
              <option value="1">No Wrapper</option>
              <option value="2">No JS</option>
              <option value="3">Nice!</option>
            </select>
          </div>

          <div class="input-box">
            <label for="label">Nom de l'activité</label>
            <input type="text"  name="activité">
          </div>
          <div class="input-box">
            <label for="label">Description de l'activité</label>
            <input type="text"  name="description">
          </div>
          <div class="input-box">
            <label for="label">Date à la quelle se déroulera l'activité  </label>
            <input type="date"  name="date">
          </div>

          <div class="button">
            <input type="submit" value="Enregistrer" name="add_pj">
          </div>
        </form>
     
      </div>
    </div>

    

    <!--Form To add new field in array-->


  </body>
</html>

          

            
?>