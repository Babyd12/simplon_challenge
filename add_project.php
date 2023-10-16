
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

  <?php include 'menu.php'; ?>

    <div class="container">
      <div class="content">
        <div class="left-side">
            
        </div>
        <div class="right-side">
          <div class="topic-text">Enregistrer Un nouveau projet</div>
          <?php  
              if(!empty($_SESSION['errorsArray'])){
                foreach($_SESSION['errorsArray'] as $error_msg){
                  echo '<div class="topic-text" style = "color:black;font-size:20px;">' .$error_msg. '</div>';
                
                }
              }
            ?>

        <form action="exe/exe_add_project.php">
          <div class="input-box">
            <label for="label">Nom du projet</label>
            <input type="text" name="nom_projet">
          </div>
          <div class="input-box">
            <label for="label">propriétaire du projet</label>
            <input type="text"  name="propriétaire">
          </div>

          <!--<div class="input-box">
            <label for="label">Nombre d'activité</label>
            <input type="text"  name="statu">
          </div>-->

          <div class="input-box message-box">
            <label for="label">Description du projet</label>
            <textarea class="input-box message-box" id="label" name="description" ></textarea>
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