<?php 
session_start();

if (isset($_GET['add_activite'])){

    $regex_date = '/^([0-2][0-9]|3[0-1])-([0-9]|1[0-2])-[0-9]{4}$/';
    $regex_text_field = "/^[a-zA-Z0-9À-ÿ\s]*$/";

    if( trim(empty($_GET['partenaire'])) || trim(empty($_GET['description'])) || trim(empty($_GET['date'])) ){
        $error = true;
        $error_msg[]= 'Les champs vides ne sont pas valides';

    }else if( !preg_match($regex_text_field, $_GET['partenaire']) || !preg_match($regex_text_field, $_GET['description']) ){
        $error = true;
        $error_msg[]= 'Champ partenaire ou description invalide';
       
    }else if(!preg_match($regex_date, $_GET['date']) ){
        $error = true;
        $error_msg[]= 'Forma de date invalide';
    }

    if($error){
        $_SESSION['errorsArray'] = $error_msg;
        header('location:' .$_SERVER["HTTP_REFERER"]); die();
    }

    foreach ($_SESSION['projets'] as  $key=> $projet) {
        //echo 'les clé du tableau : '.$key.'<br>';
        //echo 'key envoyé : '. $_GET['projet_key'] ; die();
        if($key==$_GET['projet_key']){
                    
                $partenaire = ['nom' => $_GET['partenaire'], 'description' => $_GET['description'] , 'date' => $_GET['date']];       
                $_SESSION['projets'][$_GET['projet_key']]['partenaires'][] = $partenaire; // Mettre à jour l'partenaire dans $_SESSION
                $_SESSION['sucess_msg']= 'Votre insertion a reussi';
                header('location:' .$_SERVER["HTTP_REFERER"]);
                die();
            }else{
                $_SESSION['sucess_msg']= 'Ce Projet n\'existe pas ';
                header('location:' .$_SERVER["HTTP_REFERER"]);
            }

        }

    }else{
        $_SESSION['sucess_msg']= 'Formulaire inconnu';
        header('location:' .$_SERVER["HTTP_REFERER"]);
    }



/*

  

   if(preg_match($regex, $_GET['partenaire'])){

    }else if(preg_match($regex, $_GET['description'])){

    }else{
        echo 'something went wrong';
    }
    
}else{
    echo "no activity";
}
*/
?>