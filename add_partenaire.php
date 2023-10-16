
<?php session_start(); ?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/project.css"/>
    <meta charset="utf-8">
   <title>Project Management</title> 
 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

    <?php include 'menu.php'; ?>

    <div class="container">
      <div class="content">
        <div class="left-side">
            
        </div>
        <div class="right-side">
          <div class="topic-text">Enregistrer Un partenair pour un projet</div>
          <?php if(isset(  $_SESSION['sucess_msg']  )){
            
            echo ' <p style= "font-size: 30px;">'.$_SESSION['sucess_msg'].'</p>';
            //sleep(5);
            unset($_SESSION['sucess_msg']);
            //header("refresh: 10"); 
          }
          ?>

          <p style= "font-size: 20px;">Selectionner un projet:</p>
          <?php  
              if(!empty($_SESSION['errorsArray'])){
                foreach($_SESSION['errorsArray'] as $error_msg){
                  echo '<div class="topic-text" style = "color:black;font-size:20px;">' .$error_msg. '</div>';
                
                }
              }
            ?>

      <form action="exe/exe_add_partenaire.php" method="get">
          <div class="input-box">
              
              <select name="projet_key">
                  <?php
                  if (!empty($_SESSION['projets'])) {
                      $projets = $_SESSION['projets'];
                      foreach ($projets as $key => $projet) {
                          echo '<option value="' . $key . '"> ' . $projet['nom_projet'] . '</option>';
                      }
                      unset($_SESSION['errorsArray']);
                  } else {
                      echo '<option value="">Aucun projet disponible</option>';
                  }
                  ?>
              </select>
            </div>
            <div class="input-box">
                <label for="activité">Nom du partenaier</label>
                <input type="text" name="partenaire">
            </div>
            <div class="input-box">
                <label for="description">Description du partenaire</label>
                <input type="text" name="description">
            </div>
            <div class="input-box">
                <label for="date">Date de début du partenariat</label>
                <input type="date" name="date">
            </div>
            <div class="button">
                <input type="submit" value="Enregistrer" name="add_activite">
            </div>
        </form>

          
            </div>
          </div>

    

  

  </body>
</html>

          

            