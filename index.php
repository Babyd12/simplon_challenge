<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
   <!-- <link rel="stylesheet" href="admin_bord/css/project.css">  -->
    <title>Document</title>
</head>
<body>
   
    <nav>
        <ul class="menu" style="width:auto;">
          <li><a href="#!">Home</a></li>
          <li><a href="login.php">Connexion</a></li>
          <li><a href="pages">dec</a></li>
          <li><a href="admin_bord/bord.php"> DashBoard</a></li>
        </ul>
      </nav>

    <?php 
    session_start();
    include 'config.php';

    if(!isset($_SESSION['userActif']) ){
        
        $_SESSION['welcome'] = false;
        header('location:login.php');
    }else{
        if(isset($_SESSION['welcome']) && $_SESSION['welcome'] == true){
            echo "
                    <h1 style='position:relative; left:550px; bottom: 244px; font-size: 15vh; color:white;'>Bienvenu ".$_SESSION["nomUserActif"]."  </h1>
               ";
            unset($_SESSION['welcome']);
        }else if(isset($_SESSION['welcome']) && $_SESSION['welcome'] == false){
            //la session existe mais il nest pas a sa première connexion

        }

    }



    /*
    if(isset($_SESSION['userActif']) &&  $_SESSION['welcome'] == true){
       
            echo "<div class='msgError> 
                    <h1>Bienvenu </h1>
                </div>";
       
            echo "salut";
        
    }else{
        ?>
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
        <?php
        
    }*/
    ?>

</body>


</html>