<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
</head>
<body>
    
<?php 
     session_start();
    include '../config.php';

    if(isset($_GET['send'])){
       // echo 'ici'; die();
        $regexText = '/^[a-zA-Z0-9-ÿ\s]{2,}$/';
        $regexEmail = '/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.%-]+\.[a-zA-Z]{2,}$/';
        $regexPhoneSn = '/^7(|[7]|[8]|[6]|[0])+[0-9\S]{7}$/';   

        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $email = $_GET['email'];
        $password = md5($_GET['pswd']);
        $password1 = md5($_GET['pswd2']);
        $tel = $_GET['tel'];
        $date = date('Y-m-d');
        $etat = 0;
        
        $_SESSION['nom'] = $nom; 
        $_SESSION['prenom'] = $prenom; 
        $_SESSION['email'] = $email; 
        $_SESSION['tel'] = $_GET['tel']; 

        $_SESSION['errorArray']=[];
        $error = false;
        //$error_msg = [];
      
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

        }else if($password != $password2){
            $error = true;
            $_SESSION['errorArray'][]= "Les mots de passe ne sont pas identique";
        }

        if($error) {
            header("Location: ".$_SERVER["HTTP_REFERER"]);
            
            die();
        }else {
            //Je vérifie si lemail entré n'est nexiste pas déjà 

            $req = "SELECT * FROM users WHERE emailUser = '".$email."' OR phoneUser = '".$tel."' ";
            $exe = $bdd->query($req);
            $row = $exe->rowCount();
            if($row != 0){
                $_SESSION['errorArray'][]= "L'email  ou le numéro de téléphone est déjà utilisé.";
                header("Location: ".$_SERVER["HTTP_REFERER"]);   
                die();
    
            }else if($row ==0){

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
                
                unset($_SESSION['nom']);
                unset($_SESSION['prenom']);
                unset($_SESSION['email']);
                unset($_SESSION['tel']);
    
                echo "<script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Votre compte à été créer avec succès',
                            text:   'Redirection encours...',
                            showConfirmButton: false,
                            timer: 5000 //3000 -> 3 Seconds
    
                        }).then(function() {
                            window.location.href = '../login.php';
                        });
                    </script>";
                die();
            }
        }
  
    
}{
    $error = true;
    $_SESSION['errorArray'][]= "The requested URL was not found on this server--> informer un administrateur";
    header("Location: ".$_SERVER["HTTP_REFERER"]);
}

?>

</body>
</html>
