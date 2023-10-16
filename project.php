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
    <?php 
    
          /*  $projets = [
                [
                    'nom_projet' => 'ADEF NIPA',
                    'propriétaire' =>'OIF',
                    'description' => 'Ce projet vise à financer la formation de 60 jeunes soit 30 femmes et 30 hommes dans le domaine du numérique',
                    'statu' =>'actif',
                    'activitées' => [
                            ['activité' => 'Information', 'description' => ' Reunion D\'information pour les participants du projet ', 'date' =>'11/04/2022'],           
                            ['activité' => 'Entretriens', 'description' => ' Faire passer des entretients groupé et observer les participants', 'date' =>'23/04/2022']          
                    ]
                ],
                [
                    'nom_projet' => 'SIMPLON FORMATION',
                    'propriétaire' =>'OIF',
                    'description' => 'Ce projet vise à financer la formation de 60 jeunes soit 30 femmes et 30 hommes dans le domaine du numérique',
                    'statu' =>'innactif',
                    'activitées' => [
                            ['activité' => 'Information', 'description' => ' Reunion D\'information pour les participants du projet ', 'date' =>'11/04/2022'],           
                            ['activité' => 'Entretriens', 'description' => ' Faire passer des entretients groupé et observer les participants', 'date' =>'23/04/2022'],          
                            ['activité' => 'Information', 'description' => ' Reunion D\'information pour les participants du projet ', 'date' =>'11/04/2022'],           
                            ['activité' => 'Entretriens', 'description' => ' Faire passer des entretients groupé et observer les participants', 'date' =>'23/04/2022']          
                    ],
                    partenaires =>   ['nom' => 'ODC', 'description' => ' Reunion D\'information pour les participants du projet ', 'date' =>'11/04/2022'], 
                ],
            ] ;


    
            $_SESSION['projets'] = $projets;
    */
    
    ?>
    <?php include 'menu.php'; ?>

    <div class="content">
      <div class="header">Project Management</div>
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
            <?php 
          
          if(!empty($_SESSION['projets'])){
            $keys = array_keys($_SESSION['projets']);
            //print_r($keys);
              $projets = $_SESSION['projets'];
              $count = 1;
              for($i =0; $i < count($projets) ; $i++){
                  $projet = $projets[$i];
                  $miniDescription = substr($projet['description'], 0, 60);
                  $key = $keys[$i];
                  echo'<tr>'; 
                      echo '<td>' . $count++ . '</td>';
                      echo '<td>' . $projet['nom_projet'] . '</td>';
                     // echo '<td>' . count($projet['activitées']) . '</td>';
                     echo '<td>' . (isset($projet['activitées']) ? count($projet['activitées']) : "vide") . '</td>';
                      echo '<td>' . $projet['statu'] . '</td>';
                      echo '<td>' . $projet['propriétaire'] . '</td>';
                     //echo ( '<td>' . $miniDescription.'</td><br>') ;
                     echo '<td>
                                "'.$miniDescription.'"<br>
                                <form action="show_more.php">
                                    <select name="show_more_selected" hidden>
                                        <option value="'.$key.'"></option>
                                        <input type="submit" name="show_more" value="Voir plus" class="btn"/>
                                    </select>
                                </form>
                            </td>
                    ';
                  echo'</tr>';
                  
              }
            }

            ?>



            
            
          </tbody>
        </table>
      </div>
    </div>
    


  </body>
</html>