<?php
session_start();

if(isset($_GET['convert'])){
    $montantXOF = $_GET['amound'];
    $tauxDeChange = 655.957;
    $montantEUR = $montantXOF / $tauxDeChange;
    echo "Montant en euro : " . number_format($montantEUR, 2) . " EUR";
    $_SESSION['euro_value'] = $montantEUR;
}




?>