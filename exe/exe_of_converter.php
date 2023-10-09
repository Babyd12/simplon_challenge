<?php

include '../index.php';
$error = "Invalid amound";

if(isset($_GET['action'])){

    $montantXOF = $_GET['amound'];
   $_SESSION['history'][] = $montantXOF;
   

   $_SESSION['date_history'][] = displayCurrentTime();
   //$_SESSION['frist_insert']++;

    //print_r($_SESSION['date_history']); 

    if($montantXOF < 0){
        echo $_SESSION['euro_value'] = $error;
        header('location:' .$_SERVER['HTTP_REFERER']);
        die();
    }

    $tauxDeChange = 655.957;
    $montantEUR = $montantXOF / $tauxDeChange;
    //echo "Montant en euro : " . number_format($montantEUR, 2) . " EUR";
   
   $_SESSION['euro_value'] = number_format($montantEUR, 2);
   header('location:' .$_SERVER['HTTP_REFERER']);

}
else{
    echo "Je nai pas recu daction";
}

?>