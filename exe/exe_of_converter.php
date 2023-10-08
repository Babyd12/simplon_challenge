<?php

include '../index.php';
$error = "Invalid amound";

if(isset($_GET['action'])){

    $montantXOF = $_GET['amound'];

   $_SESSION['date_history'][] = [
        'date' => date('Y-m-d')
        
    ];
   $_SESSION['val'][] = [
        'date' => date('Y-m-d'),
        'montant' => $_GET['amound']
    ];

    if($montantXOF < 0){
        echo $_SESSION['output_value'] = $error;
        header('location:' .$_SERVER['HTTP_REFERER']);
        die();
    }

    $tauxDeChange = 655.957;
    $montantEUR = $montantXOF / $tauxDeChange;
    //echo "Montant en euro : " . number_format($montantEUR, 2) . " EUR";
   
   $_SESSION['output_value'] = number_format($montantEUR, 2);
   header('location:' .$_SERVER['HTTP_REFERER']);

}
else{
    echo "Je nai pas recu daction";
}

?>