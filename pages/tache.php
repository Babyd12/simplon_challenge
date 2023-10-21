<?php session_start();
include '../config.php' ?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Animated Image Gallery | CodingLab </title>
    <link rel="stylesheet" href="../ressources/css/tache.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   </head>
<body style="">

          <form action="../exe/exe_logout.php" method="get">
          <!-- <input type="submit" value="Déconnexion" name="logoutMe" style="float:left; position:relative; margin-bottom:650px; left:289px;"> -->
          <button type="submit" class="button" name="logoutMe" style="--clr:#39FF14;  position:absolute; top: 6%; left:10%;"><span>Deconexion</span><i></i></button>
        </form>
  <div class="container">

    <input type="radio" name="s" id="home" >
    <input type="radio" name="s" id="blog" checked>
    <input type="radio" name="s" id="code">
    <input type="radio" name="s" id="help">
    <input type="radio" name="s" id="about">




    <nav>
      <div class="slider"></div>
      <label class="welcom" for="home">
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

  <div class="tasks">

    <div class="task-header">
      <section class="sec1">
        <h1>Gestion de mes tâches</h1>
        <?php echo '<p>' .(isset($_SESSION['userActif']) ? $_SESSION['nomUserActif'] : '') .'</p>';  ?>
      </section>
      <button style="--clr:#39FF14; position:absolute; margin-left:100%; margin-bottom:40%; width:322px; " ><span><a href="#ajoutTache" style="text-decoration:none; color:#fff;">Ajouter une tâche</a></span><i></i></button>
    </div>


    <?php 
          if(isset($_SESSION['errorArray'])) {
            foreach($_SESSION['errorArray'] as $error_msg){
              echo "<p style='position:absolute; left:45%; margin-top:6px;' >$error_msg</p>";
            }
          }
          else if(!empty($_SESSION['succesMsg'])){
            echo "<p style='position:absolute; left:45%; margin-top:6px;' >".$_SESSION['succesMsg']."</p>";
            // unset($_SESSION['succesMsg']);
          }

    ?>

  <?php 
          $stmt = $bdd ->prepare("SELECT t.idTache, t.nomTache, t.descriptionTache, t.dateDebut, t.dateFin, p.prioriteType, s.statuType
            FROM tache as t
            INNER JOIN priorite as p ON t.fkPrioriteId = p.PrioriteId
            LEFT JOIN statu as s ON t.fkStatuId = s.StatuId
            GROUP BY t.idTache, t.nomTache, t.descriptionTache, t.dateFin, t.dateFin, p.prioriteType, s.statuType
            ");
          $stmt -> execute();
          $rows = $stmt ->fetchAll(PDO::FETCH_ASSOC);
         // print_r($rows); die();
          foreach ($rows as $row){
            echo '
                  <div class="task-content">
                  <div class="head-task-content">
                    <h2>Titre de la tache: '.$row['nomTache'].' </h2>
                    <p>Description de la tache: '.$row['descriptionTache'].'</p>
                  </div>
                  <div class="middel-task-content">
                    <p>Durée début: '.$row['dateDebut'].'</p> <p>Dadte fin : '.$row['dateFin'].'</p>
                  </div>
                  <div class="end-task-content">
                    <p>priorité : '.$row['prioriteType'].'</p> <p>Statut : '.$row['statuType'].'</p>
                    <input type="submit" value="Voir les détails">
                  </div>
                </div>
            ';
          }

        ?>
    <div class="task-content">
      <div class="head-task-content">
        <h2>Nom de la tache</h2>
        <p>Description de la tache</p>
      </div>
      <div class="middel-task-content">
        <p>Durée début: date</p> <p>Dadte fin :date</p>
      </div>
      <div class="end-task-content">
        <p>priorité : Haute</p> <p>Statut : Encours</p>
        <input type="submit" value="Voir les détails">
      </div>
    </div>

    <div class="task-content">
      <div class="head-task-content">
        <h2>Nom de la tache</h2>
        <p>Description de la tache</p>
      </div>
      <div class="middel-task-content">
        <p>Durée de la tache</p>
      </div>
      <div class="end-task-content">
        <p>priorité : Haute</p> <p>Statut : Encours</p>
        <input type="submit" value="Voir les détails">
      </div>
    </div>


    
    <form action="../exe/exe_add_tache.php" method="get">
      <div class="add-task">
        <h2 > <a id="ajoutTache">Ajouter une nouvelle tâche</a></h2>
          <div class="row1">
            <label class="label">Titre</label>
            <input type="text" name="titre" id="">
          </div>

        
          <?php 
            $stmt = $bdd->prepare("SELECT * FROM priorite") ;
            $stmt->execute();
            $arrays = $stmt->fetchAll(PDO::FETCH_ASSOC);
             
            // print_r($lines);
            // print_r($lines[0]['prioriteType']);
            // // die();
            echo '  <p >Priotrité de la tâche</p>';
            echo '<select name="priorite">';
           
            foreach($arrays as $key => $array){    
              // foreach($value as $key2 => $line){
                  echo '           
                    <option selected value="'.$key.'">'.$array['prioriteType'].'</option>       
                  ';
              // }
            }
            echo '</select>';


            echo '<p>Statu de la tâche</p>';
            $stmt2 = $bdd->prepare("SELECT * FROM statu");
            $stmt2 ->execute();
            $arrays2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            // print_r($arrays); die();
            echo '<select name="statu">';
          
            foreach ($arrays2 as $key2 => $array2) {
                echo '           
                <option selected value="'.$key2.'">'.$array2['statuType'].'</option>       
              ';
            }
            echo '</select>';
          ?>

          <div class="row1">
            <label class="label">Date début de la tâche</label>
            <input type="date" name="date_debut" id="">
          </div>
          <div class="row1">
            <label class="label">Date Fin de la tâche</label>
            <input type="date" name="date_fin" id="">
          </div>

          <div class="row1">
            <label class="label">Description</label>
            <textarea name="description" id="" class="textarea"></textarea>
          </div>

          <input type="submit" value="Enregistrer" name="send_task">
      </div>
    </form>

  </div>


  
  
</body>
</html>