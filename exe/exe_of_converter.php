<?php
//last commit is good now after lost more commits
/*MobSpyco 2002% */
include '../index.php';
$error = "Invalid amound";
date_default_timezone_set('Africa/Monrovia');

if(isset($_GET['action'])){

    $montantXOF = $_GET['amound'];
    if($montantXOF < 0){
        echo $_SESSION['output_value'] = $error;
        header('location:' .$_SERVER['HTTP_REFERER']);
    }


   $_SESSION['date_history'] = [
        ['date' => date('Y-m-d')]
    ];
    
   $_SESSION['val'] = [
        ['date' => date('Y-m-d'), 'montant' => $_GET['amound'] ]
    ];

    if(!isset($_SESSION['global_merge_data'] )){
        $_SESSION['global_merge_data'] =[];
    }

    
    foreach ($_SESSION['date_history'] as $entry) {
        $date = $entry['date'];
        if (!isset($_SESSION['global_merge_data'][$date])) {
           $_SESSION['global_merge_data'][$date] = [];
        }
     }
     
     foreach ($_SESSION['val'] as $entry) {
           $date = $entry['date'];
           $montant = $entry['montant'];
           if (isset($_SESSION['global_merge_data'][$date])) {
              $_SESSION['global_merge_data'][$date][] = $montant;
           }
     }



    $tauxDeChange = 655.957;
    $montantEUR = $montantXOF / $_SESSION['constant_fcfa'];
    //echo "Montant en euro : " . number_format($montantEUR, 2) . " EUR";
   
   $_SESSION['output_value'] = number_format($montantEUR, 2);
   header('location:' .$_SERVER['HTTP_REFERER']);

}
else{
    echo "Je nai pas recu daction";
}

?>