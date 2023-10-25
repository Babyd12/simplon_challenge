<?php 
    session_start();
    include '../config.php';
    if(isset($_GET['terminé'])){
        $tacheId = $_GET['voirPlus'];
        $statuName = $_GET['statuType'];
        $newStatut = 4;
        unset($_SESSION['errorArray']);

        //cas static ou le statu est déjà à terminé 
        if($statuName == 'Terminé'){
            $_SESSION['errorArray'][] = 'La tâche est déjà terminé';
            header('location:'.$_SERVER['HTTP_REFERER']);
            die();
        }
        //Vérification que le champ envoyé existe bien dans la db
        $req = "SELECT * FROM statu WHERE statuType = '" . $statuName. "'";
        $exe = $bdd->query($req);
        $row = $exe->rowCount();
        if($row == 0){
            $_SESSION['errorArray'][] = 'Statut inconnu';
            header('location:'.$_SERVER['HTTP_REFERER']);
            die();
        }
       
        $stmt = $bdd ->prepare("UPDATE tache SET fkStatuId = :fkStatuId  WHERE idTache = :idTache");
        $stmt ->bindParam(':idTache',$tacheId);
        $stmt ->bindParam(':fkStatuId',$newStatut);
        $stmt ->execute() or die(print_r($stmt->errorInfo()));

        $_SESSION['successMsg'] = 'Le statu de la tache a été modifier avec succès';
        header('location:'.$_SERVER['HTTP_REFERER']);

    } //si le form envoyer est déclancher par le bouton de surppression
    else if(isset($_GET['supprimer'])){
        $tacheId = $_GET['voirPlus'];
        $statuName = $_GET['statuType'];
        unset($_SESSION['errorArray']);

        $req = "SELECT * FROM statu WHERE statuType = '" . $statuName. "'";
        $exe = $bdd->query($req);
        $row = $exe->rowCount();
        if($row == 0){
            $_SESSION['errorArray'][] = 'Statut inconnu';
            header('location:'.$_SERVER['HTTP_REFERER']);
            die();
        }

        $stmt = $bdd ->prepare("DELETE FROM tache WHERE idTache = :idTache");
        $stmt ->bindParam(':idTache',$tacheId);
        $stmt ->execute() or die(print_r($stmt->errorInfo()));

        $_SESSION['successMsg'] = 'Le statu de la tache a été modifier avec succès';
        header('location:'.$_SERVER['HTTP_REFERER']);
    }

    else{
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
?>