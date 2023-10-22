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
<body>

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
   
    </div>

    <!--Afficha du message derreur ou de succes -->
    <?php echo '<p>' .(isset($_SESSION['successMsg']) ? $_SESSION['successMsg'] : '') .'</p>';  
            unset($_SESSION['successMsg']);

            if(isset($_SESSION['errorArray'])) {
                foreach($_SESSION['errorArray'] as $error_msg){
                    echo "<p style='position:relative;left:45%; margin-top:6px;' >$error_msg</p>";
                }
                unset($_SESSION['errorArray']);
            }
    ?>
    
<?php
    if(isset($_GET['sendVoirPlus'])){
        $key = $_GET['idTache'] ;


        $stmt = $bdd ->prepare("SELECT t.idTache, t.nomTache, t.descriptionTache, t.dateDebut, t.dateFin, p.prioriteType, s.statuType
        FROM tache as t
        INNER JOIN priorite as p ON t.fkPrioriteId = p.PrioriteId
        LEFT JOIN statu as s ON t.fkStatuId = s.StatuId
        WHERE t.idTache = :idTache
        GROUP BY t.idTache, t.nomTache, t.descriptionTache, t.dateDebut, t.dateFin, p.prioriteType, s.statuType");
        $stmt ->bindParam(':idTache',$key,PDO::PARAM_INT);
        $stmt ->execute();
        $rows = $stmt ->fetchAll();
        if(count($rows) !=0){
            foreach ($rows as $row){
                echo '
                      <form method="get" action="../exe/exe_edite_tache.php" >
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
                            <input type="hidden" name="voirPlus" value="'.$row['idTache'].'">
                            <input type="hidden" name="statuType" value="'.$row['statuType'].'">
                            <div class="input-delete-task" style="display:flex; flex-firectione:row; margin-right:99%;">
                                <input type="submit" value="Marquer comme terminée" name="terminé" style="display:flex; border-radius: 6px 6px; color:white; padding:6px 6px; ">
                                <input type="submit" value="Supprimer la tâche" name="supprimer" style="display:flex; background-color:red; border-radius: 6px 6px; color:white; padding:6px 6px;">
                            </div>
                          </div>
                        </div>
                      </form>
                ';
              }
            
            }
        }
        else{
            echo '                       
             <div class="task-content">
                <div class="head-task-content">
                <h2>Aucune tâche disponible </h2>

                </div>
            </div>';
        }
  
?>
    



    
    <form action="../exe/exe_add_tache.php" method="get">
      <div class="add-task">
        <h2 > <a id="ajoutTache">Modifier le statu de la tâche</a></h2>
          <?php 
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
          <input type="submit" value="Enregistrer" name="send_change_statu">
      </div>
    </form>

  </div>


  
  
</body>
</html> 