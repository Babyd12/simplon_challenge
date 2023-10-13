<?php
include '../function.php';
session_start();
/*After rebase */
if (isset($_GET['action'])) {
        $getAllInput = ['name','fristname','agerange','weight','temperature','gender','cough','diarrhea','weightloss','headache' ];

        $radioFields = [ 'headache', 'cough', 'diarrhea', 'weightloss'];
        $_SESSION['errors'] = false;
       $_SESSION['errorsArray']= array();
       
        foreach($getAllInput as $giviIt){
            if(isset($_SESSION[$giviIt])){
                $_SESSION[$giviIt] = $_GET[$giviIt];
            }
           
        }
        
        foreach($getAllInput as $empty){  

            if(empty($_GET[$empty]) ){   
                
                $_SESSION['errors'] = true;
                //echo "des vides 1"; die();
                 $_SESSION['errorsArray'][]= "Don't leave a empty field";
                header('Location: ' .$_SERVER['HTTP_REFERER']);

            }elseif( isSafeInputs($_GET[$empty])){
                //echo $_GET[$empty];
                //echo "caractère innatendu"; die();
                $_SESSION['errorsArray'][]= "Do not use ASCII characters or html tags";
                header('Location: ' .$_SERVER['HTTP_REFERER']);

            }elseif(empty(trim( ($_GET[$empty]) ) )){
                $_SESSION["space"] = "space";
                $_SESSION['errors'] = true;     
                //unset($_SESSION[$empty]);
                $_SESSION['errorsArray'][]= "Don't use a space or leave the choice unselected";
                //echo "have space or je fous quoi lq";
                //die();
                header('Location: ' .$_SERVER['HTTP_REFERER']);

            }else{
                //$empty = filter_var($_GET[$empty], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $_SESSION[$empty] = $_GET[$empty]; 
            }

          

        }      

        if( strlen($_GET['name']) ==1 || strlen($_GET['name']) >=15  || strlen($_GET['fristname']) ==1 || strlen($_GET['fristname']) >=15   ){
            $_SESSION['errors'] = true;
            $_SESSION['sizeNameError'] = true;
           $_SESSION['errorsArray'][]= "The length of your name or first name is too long or too short min 2 max 15";
            //die();
           
        } elseif( is_numeric($_GET['name']) || is_numeric($_GET['name'])  || is_numeric($_GET['fristname']) || is_numeric($_GET['fristname'] ) ){
            $_SESSION['errors'] = true;
            $_SESSION['nameError'] = true;
           $_SESSION['errorsArray'][]= "Name or Last name field must not be a number";
            // die();
        }

        if(!is_numeric($_GET['weight']) && !is_numeric($_GET['temperature'])  ){
            $_SESSION['errors'] = true;
            $_SESSION['errorInputType'] =true;
           $_SESSION['errorsArray'][]= "Define a valid value in the weight or temperature field";
           
            //die();
            header('Location: ' .$_SERVER['HTTP_REFERER']);

        }elseif ( ($_GET['weight'] >= 0 && $_GET['weight'] <= 150) && ($_GET['temperature'] >= 32 && $_GET['temperature'] <= 43)){
           
            $_SESSION['error_temperature'] = false;
            $_SESSION['error_weight'] = false;


        }else{
            $_SESSION['errors'] = true;
           $_SESSION['errorsArray'][]="The weigh or temperature field has exceeded the authorized limit..";
        }

        $_SESSION['percentage'] = 0;
        
        
        //unset($_SESSION['isEmpty']);
        if($_SESSION['errors'] == true){
           // echo "ya des erreurs";
           $_SESSION['errorsArray'][]= "Give valid information please!";
            //echo " "; die();
            header('Location: ' .$_SERVER['HTTP_REFERER']);
            
        }
        else {  
            //le form nest pas vide 
            //echo "ya pas derreur"; die();
            //test perso              

            //affectation
            foreach($getAllInput as $giviIt){
                $_SESSION[$giviIt] = $_GET[$giviIt];
            }
    
           
            //controle personalisé
  

            foreach ($radioFields as $field) {
                if (isset($_GET[$field]) === 'oui') {
                    $_SESSION['percentage'] += 10;
                } else {
                    $_SESSION['percentage'] = 0;
                }
            }

            if ($_GET['temperature'] >= 32 || $_GET['temperature'] <= 36) {
                $_SESSION['percentage'] += 10;
            }else {
                $_SESSION['percentage'] += 30;
            }

            if ($_GET['weight'] > 50 ){
                $_SESSION['percentage'] += 30;
            }

            if ($_GET['agerange'] == "child" ) {
                $_SESSION['percentage'] += 10;
            }
            elseif ($_GET['agerange'] == "teenager"){
                $_SESSION['percentage'] += 30;
            }
            elseif ($_GET['agerange'] == "adult"){
                $_SESSION['percentage'] += 50;
            }
            elseif ($_GET['agerange'] == "old"){
                $_SESSION['percentage'] += 60;
            }


            echo $_SESSION['percentage'];
           
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }

        
       // Vérification n2

    }

?>
