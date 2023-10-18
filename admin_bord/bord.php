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
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../config.php';
        $req = "SELECT * FROM users ";
        $exe = $bdd->query($req);
        $row = $exe->rowCount();
        if ($row != 0) {
            $count = 1;
            while ($line = $exe->fetch(PDO::FETCH_ASSOC)) {
                extract($line);

                $nom = $line['nomUser'];
                $prenom = $line['prenomUser'];
                $email = $line['emailUser'];
                $tel = $line['phoneUser'];
                echo '<tr>';
                echo '<td>' . $count++ . '</td>';
                echo '<td>' . $nom . '</td>';
                echo '<td>' . $prenom . '</td>';
                echo '<td>' . $email . '</td>';
                echo '<td>' . $tel . '</td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>
        
    


  </body>
</html>