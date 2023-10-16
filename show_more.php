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
    <div class="content">
          <?php 
            if(isset($_GET['show_more'])){
              $nom_projet = $_SESSION["projets"][$_GET["show_more_selected"]]["nom_projet"];
              echo '<div class="header">Détail du projet '.$nom_projet.' </div>';
            }
          ?>
          <div class="table-container">
            <table>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Partenaires</th>
                  <th>Description</th>
                  <th>Date début de partenariat</th>
                 
                <!--  <th>Number Activity</th>-->
                  <th class="different_head">Project Ownner</th>
                  <th class="different_head">Project Status</th> 
                  <th class="different_head">number of Activity</th>
                  <th class="different_head">Liste of Activity</th>
                  
                  
                
                  
                </tr>
              </thead>
              <style>
                .different_head{
                  background-color: black;
                }
              </style>
        
              <tbody>
                    
                  <?php
                    if(isset($_GET['show_more'])){
                     
                      $array_key = $_GET['show_more_selected']; 
                      $projet = $_SESSION['projets'][$array_key];

                        $count = 1;
                        
                        if(isset($projet['partenaires'])){
                            foreach ($projet['partenaires'] as $partenaire) {
                          
                              echo'<tr>'; 
                                  echo '<td>' . $count++ . '</td>';
                                  echo '<td>' . $partenaire['nom'] . '</td>';
                                  echo '<td>' . $partenaire['description'] . '</td>';
                                  echo '<td>' . $partenaire['date'] . '</td>';
                             
                             
                                  echo '<td>' . $projet['propriétaire'] . '</td>';
                                  echo '<td>' . $projet['statu'] . '</td>';                         
                                  echo '<td>' . (isset($projet['activitées']) ? count($projet['activitées']) : "vide") . '</td>';
                                  
                                  echo '<td>';     
                                      foreach($projet['activitées'] as $key => $tabs){   
                                                                                        
                                        foreach($tabs as $key1 => $tab){
                                  
                                          echo($key1 .' '.$key.' : '.$tab);
                                          
                                          echo '<br />';                        
                                        
                                        }                         
                                        echo '<br />';        
                                      }
                                  echo '</td>';                         
                              echo'</tr>';  
                            }
                         //print_r($projet['activitées']);
                        }else{
                          echo 'Ce projet n\'a aucun partenarie';
                        }
                        
                    }else{
                      echo 'la session est vide'; 
                    }

                  ?>
              </tbody>
        </table>
      </div>
    </div>
    


  </body>
</html>
