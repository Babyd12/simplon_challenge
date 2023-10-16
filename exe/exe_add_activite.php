<?php 
session_start();

if (isset($_GET['add_activite'])){

    $error = false;
    $error_msg = [];
    $regex_date = '/^([0-2][0-9]|3[0-1])-([0-9]|1[0-2])-[0-9]{4}$/';
    $regex_text_field = "/^[a-zA-Z0-9À-ÿ\s]*$/";

    if( trim(empty($_GET['activité'])) || trim(empty($_GET['description'])) || trim(empty($_GET['date'])) ){
        $error = true;
        $error_msg[]= 'Les champs vides ne sont pas valides';
      

    }else if( !preg_match($regex_text_field, $_GET['activité']) || !preg_match($regex_text_field, $_GET['description']) ){
        $error = true;
        $error_msg[]= 'Champ activité ou description invalide';
        
    }else if(!preg_match($regex_date, $_GET['date']) ){
        $error = true;
        $error_msg[]= 'Forma de date invalide';
        
    }

  /*  if(!preg_match($_GET['date'], $regex_date)){
        $error = true;
        $error_msg[] = 'Le type de date n\'est pas valide';
    }*/

    if($error){
        $_SESSION['errorsArray'] = $error_msg;
        header('location:' .$_SERVER["HTTP_REFERER"]); die();
    }
    

    foreach ($_SESSION['projets'] as  $key=> $projet) {
        
        if($key==$_GET['projet_key']){
                    
                $activité = ['activité' => $_GET['activité'], 'description' => $_GET['description'] , 'date' => $_GET['date']];       
                $_SESSION['projets'][$_GET['projet_key']]['activitées'][] = $activité; // Mettre à jour l'activité dans $_SESSION
                $_SESSION['sucess_msg']= 'Votre insertion a reussi';
                header('location:' .$_SERVER["HTTP_REFERER"]);
            }else{
                $_SESSION['sucess_msg']= 'Cette activité n\existe';
                header('location:' .$_SERVER["HTTP_REFERER"]);
            }

        }

    }
   
        

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