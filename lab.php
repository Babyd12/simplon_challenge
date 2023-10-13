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
    session_start();
            $projets = [
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
                    ]
                ],
            ] ;
    
            //$_SESSION['projets'] = $projets;
    
            var_dump($_SESSION['projets']);
        
            if(!empty($_SESSION['projets'])){
              $projets = $_SESSION['projets'];
              for($i =0; $i < count($_SESSION['projets']) ; $i++){
                  $projet = $projets[$i];
                  echo 'a';
                  echo $_SESSION['projets'][0];
                  $miniDescription = substr($projet['description'], 0, 60);
                  echo'<tr>';                  
                      echo '<option selected value="'.$projet[$i].'"> '.$projet[$i].'</option> ';                  
                  echo'</tr>';  

                      
                     /*
                      for($j =0; $i < count($projet['activitées']) ; $j++){
                          echo '- Activité : ' . $activité['activité'] . '<br>';
                          echo '  Description : ' . $activité['description'] . '<br>';
                          echo '  Date : ' . $activité['date'] . '<br>';            
  
                      }*/
                  
              }
            }else{
              echo'tableau empty';
            }

            ?>

          </tbody>
        </table>
      </div>
    </div>
    


  </body>
</html>