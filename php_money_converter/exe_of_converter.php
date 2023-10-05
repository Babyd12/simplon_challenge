<?php
session_start();

if(isset($_GET['action'])){
    $montantXOF = $_GET['amound'];
    $tauxDeChange = 655.957;
    $montantEUR = $montantXOF / $tauxDeChange;
    //echo "Montant en euro : " . number_format($montantEUR, 2) . " EUR";
   header('location:' .$_SERVER['HTTP_REFERER']);
   //echo $_SESSION['euro_value'] = number_format($montantEUR, 2);
}
else{
    echo "Je nai pas recu daction";
}

?>