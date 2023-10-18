<?php session_start(); ?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <title>Animated Sidebar Menu | CodingLab</title> 
    <link rel="stylesheet" href="css/project.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  </head>
  <body>

    <?php include 'menu.php'; ?>

    <div class="content">
      <div class="header">Admin dashbord</div>
       <?php/* if(!empty($_SESSION['errorArray'])){
          foreach($_SESSION['errorArray'] as $errormsg){
            echo $errormsg;
          }
       }*/
       ?>
      <form action="exe/exe_reset_session.php" method="get" style="margin-bottom:10px;">    
         
          <input type="submit" value="Reset All Array" name="reset_all"class="btn" >
          <select name="reset_selected"  style="background-color:#37BC9B;">
            <?php
          /*  if (!empty($_SESSION['projets'])) {
                $projets = $_SESSION['projets'];
                foreach ($projets as $key => $projet) {
                    echo '<option value="' . $key . '"> ' . $projet['nom_projet'] . '</option>';
                }
                unset($_SESSION['errorsArray']);
            } else {
                echo '<option value="">Aucun projet disponible</option>';
            }*/
            ?>
        </select>
        <input type="submit" value="send_reset_one" class="btn" name="send_reset_one">
     </form>

      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Projects</th>
              <th>Activity</th>
              <th>Status</th>
              <th>Ownner</th>
              <th>Description</th>
              
            </tr>
          </thead>
    
          <tbody>
          <tr>
              <td>1</td>
              <td>Nom du projet</td>
              <td>3</td>
              <td>Statut du projet</td>
              <td>Propriétaire du projet</td>
              <td>"Description courte" </td>
          </tr>
  
            
          </tbody>
        </table>
      </div>
    </div>
    


  </body>
</html>