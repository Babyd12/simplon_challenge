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


    
            $_SESSION['projets'] = $projets;
    
    
    ?>
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
          <li><a href="#"><i class="fas fa-sliders-h"></i>Add Project</a></li>
          <li><a href="#"><i class="fas fa-address-book"></i>Services</a></li>
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
            $count = 1;
            for($i =0; $i < count($projets) ; $i++){
                $projet = $projets[$i];
                $miniDescription = substr($projet['description'], 0, 60);
                echo'<tr>';
                    echo '<td>' . $count++ . '</td>';
                    echo '<td>' . $projet['nom_projet'] . '</td>';
                    echo '<td>' . count($projet['activitées']) . '</td>';
                    echo '<td>' . $projet['statu'] . '</td>';
                    echo '<td>' . $projet['propriétaire'] . '</td>';
                    echo '<td>' . $miniDescription. '...'. '</td>';
                echo'</tr>';  
                    
                   /*
                    for($j =0; $i < count($projet['activitées']) ; $j++){
                        echo '- Activité : ' . $activité['activité'] . '<br>';
                        echo '  Description : ' . $activité['description'] . '<br>';
                        echo '  Date : ' . $activité['date'] . '<br>';            

                    }*/
                
            }
            
            ?>

          </tbody>
        </table>
      </div>
    </div>
    


  </body>
</html>