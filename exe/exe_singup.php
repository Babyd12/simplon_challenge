<?php 
     session_start();
    include '../config.php';
    if(isset($_GET['send'])){
        $regexText = '/^[a-zA-Z0-9-ÿ\s]*$/';
        $regexEmail = '/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.%-]+\.[a-zA-Z]{2,}$/';
        $regexPhoneSn = '/^7(|[7]|[8]|[6]|[0])+[0-9\S]{7}$/';
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $email = $_GET['email'];
        $password = $_GET['pswd'];
        $tel = $_GET['tel'];
        $date = date('Y-m-d');
        $etat = 0;

        $_SESSION['errorArray']=[];
        $error = false;
        $error_msg = [];
      
        if(!preg_match($regexText, $nom)) {
            $error = true;
            $_SESSION['errorArray'][]= "Format du champ nom invalide";
        }else if(!preg_match($regexText, $prenom)){
            $error = true;
            $_SESSION['errorArray'][]= "Format du champ prénom invalide";
           
        }else if(!preg_match($regexEmail, $email) ){
            $error = true;
            $_SESSION['errorArray'][]= "Format du champ mail invalide";
        }else if(!preg_match($regexPhoneSn, $tel)) {
            $error = true;
            $_SESSION['errorArray'][]= "Format de champ telephone invalide";

        }

        if($error) {
            header("Location: ".$_SERVER["HTTP_REFERER"]);
            die();
        }else {
            $sql = $bdd->prepare("INSERT INTO users(userId ,nomUser ,prenomUser,emailUser,phoneUser ,passwordUser,etat, dateAdded)
            Values(:userId, :nomUser, :prenomUser, :emailUser, :phoneUser, :passwordUser, :etat, :dateAdded)");
    
            $sql->bindValue(':userId','',PDO::PARAM_INT);
            $sql->bindValue(':nomUser',$nom,PDO::PARAM_STR);
            $sql->bindValue(':prenomUser',$prenom,PDO::PARAM_STR);
            $sql->bindValue(':emailUser',$email,PDO::PARAM_STR);
            $sql->bindValue(':phoneUser',$tel,PDO::PARAM_STR);
            $sql->bindValue(':passwordUser',$password,PDO::PARAM_STR);
            $sql->bindValue(':etat',$etat,PDO::PARAM_INT);
            $sql->bindValue(':dateAdded',$date);
            
            $sql->execute() or die(print_r($sql->errorInfo()));
    
            echo " <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Votre compte à été créer avec succès',
                            text:   'Redirection encours...',
                            showConfirmButton: false,
                            timer: 5000 //3000 -> 3 Seconds
                    
                        }).then(function() {
                            window.location.href = '../../page/index.php';
                        });
                    </script>";
        }


  
    
}
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"> </script>';
?>
