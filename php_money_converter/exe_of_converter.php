<?php
session_start();
$error = "Invalid amound";
$_SESSION['error'] ='';
if(isset($_GET['action'])){
    $montantXOF = $_GET['amound'];
    if($montantXOF <= 0){
        $_SESSION['error'] = $error;
        header('location:' .$_SERVER['HTTP_REFERER']);
    }else{
        $tauxDeChange = 655.957;
        $montantEUR = $montantXOF / $tauxDeChange;
        //echo "Montant en euro : " . number_format($montantEUR, 2) . " EUR";
       
       $_SESSION['euro_value'] = number_format($montantEUR, 2);
       header('location:' .$_SERVER['HTTP_REFERER']);
    }

   
}
else{
    echo "Je nai pas recu daction";
}

?>