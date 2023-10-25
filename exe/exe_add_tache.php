<?php 
    session_start();
    include '../config.php';
    include '../function.php';
    if(isset($_GET['send_task'])){
        $titre = htmlspecialchars($_GET['titre']);
        $priorite = $_GET['priorite'];
        $statu = $_GET['statu'];
        $date_debut = $_GET['date_debut'];
        $date_fin = $_GET['date_fin'];
        $description = htmlspecialchars($_GET['description']);
        $deletable = 0;
        $error = false; 
        // echo $date_debut; die();

        echo $statu; echo '<br>'; echo $priorite;
        //user peut modifier la key statu dans js et me lenvoyer. donc try catch
        unset($_SESSION['errorArray']);
        
        if(!isValidDate($date_debut) || !isValidDate($date_fin)){
            $error = true;
            $_SESSION['errorArray'][] = 'Format de date incorrect';
        }
        else if(isOnlyWhiteSpace($titre) || isOnlyWhiteSpace($description) || isOnlyWhiteSpace($date_debut) || isOnlyWhiteSpace($date_fin) ){
            $error = true;
            $_SESSION['errorArray'][] = 'Les champs vide ne sont pas autorisé';
        }
        else if(!isValidIntervalDate($date_debut,$date_fin)){
            $error = true;
            $_SESSION['errorArray'][] = 'Brother l\'tervalle de date n\'est pas bonne';
        }
        else if($statu == 'Terminé'){
            $error = true;
            $_SESSION['errorArray'][] = 'Impossible d\'ajouter une taché terminé';

        }

        if($error){
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
        else{
          
            $stmt = $bdd->prepare("INSERT INTO tache (nomTache, descriptionTache, dateDebut, dateFin, fkUserId, fkPrioriteId, fkStatuId, deletable)
            VALUES (:nomTache, :descriptionTache, :dateDebut, :dateFin, :fkUserId , :fkPrioriteId, :fkStatuId, :deletable)");
        
            $stmt ->bindParam(':nomTache',$titre,PDO::PARAM_STR);
            $stmt ->bindParam(':descriptionTache',$description, PDO::PARAM_STR);
            $stmt ->bindParam(':dateDebut',$date_debut);
            $stmt ->bindParam(':dateFin',$date_fin);
            $stmt ->bindParam(':fkUserId',$_SESSION['userId'], PDO::PARAM_INT);
            $stmt ->bindParam(':fkPrioriteId',$priorite, PDO::PARAM_INT);
            $stmt ->bindParam(':fkStatuId',$statu, PDO::PARAM_INT);
            $stmt ->bindParam(':deletable',$deletable,PDO::PARAM_INT);
    
            $stmt->execute() or die(print_r($stmt->errorInfo()));
            $_SESSION['succesMsg'] = 'Enregistrement reussir';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }

    }
?>