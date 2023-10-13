<?php 
session_start();

if (isset($_GET['add_activite'])){


   // var_dump($_SESSION['projets'][2]);
   //echo $_GET['projet_key']; die();
   
   /*$projets = [
    [
        'nom_projet' => 'ADEF NIPA',
        'propriétaire' =>'OIF',
        'description' => 'Ce projet vise à financer la formation de 60 jeunes soit 30 femmes et 30 hommes dans le domaine du numérique',
        'statu' =>'actif',
        'activitées' => [
                ['activité' => 'Information', 'description' => ' Reunion D\'information pour les participants du projet ', 'date' =>'11/04/2022'],           
                ['activité' => 'Entretriens', 'description' => ' Faire passer des entretients groupé et observer les participants', 'date' =>'23/04/2022']          
        ]
        ] */

foreach ($_SESSION['projets'] as  $key=> $projet) {
     
    if($key==$_GET['projet_key']){
                  
              $activité = ['activité' => $_GET['activité'], 'description' => $_GET['description'] , 'date' => $_GET['date']];       
            $_SESSION['projets'][$_GET['projet_key']]['activitées'][] = $activité; // Mettre à jour l'activité dans $_SESSION
            $_SESSION['sucess_msg']= 'Votre insertion a reussi';
        }

    }

}
 header('location:' .$_SERVER["HTTP_REFERER"]);
    

/*

    $regex = "/^[a-zA-Z0-9À-ÿ\s]*$/";

   if(preg_match($regex, $_GET['activité'])){

    }else if(preg_match($regex, $_GET['description'])){

    }else{
        echo 'something went wrong';
    }
    
}else{
    echo "no activity";
}
*/
?>