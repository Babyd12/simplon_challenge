<?php
session_start();

if (isset($_GET['action'])) {
    //echo "J'ai reçu le formulaire ";
    
    

        
        $getAllInput = ['name','fristname','agerange','weight','temperature','gender','cough','diarrhea','weightloss' ];
        
        foreach($getAllInput as $empty){
            unset($_SESSION[$empty]);
            if(empty($_GET[$empty])){              
                $_SESSION['emptyInput'][]= $_GET[$empty];
            }else{
                $_SESSION[$empty] = $_GET[$empty]; 
            }
        }
     

        if(empty($_SESSION['emptyInput'])){
            $_SESSION['isEmpty'] = "true"; 
           // echo " des vide"; die();
            header('Location: ' .$_SERVER['HTTP_REFERER']);
            
        }
        else {
            //le form nest pas vide 

            $_SESSION['name'] = $_GET['name'];
            $_SESSION['fristname'] = $_GET['fristname'];
            $_SESSION['weight'] = $_GET['weight'];
            $_SESSION['temperature'] = $_GET['temperature'];
            $_SESSION['gender'] = $_GET['gender'];
            $_SESSION['agerange'] = $_GET['agerange'];
            $_SESSION['headache'] = $_GET['headache'];
            $_SESSION['cough'] = $_GET['cough'];
            $_SESSION['diarrhea'] = $_GET['diarrhea'];
            $_SESSION['weightloss'] = $_GET['weightloss'];
    
            $_SESSION['percentage'] = 0;
            //controle personalisé

            $radioFields = [ 'headache', 'cough', 'diarrhea', 'weightloss'];

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
