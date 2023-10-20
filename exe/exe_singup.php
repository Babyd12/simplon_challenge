<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXE</title>
 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
</head>
<body>
<?php 
    include '../config.php';
    if(isset($_GET['send'])){
        $name = htmlspecialchars($_GET['name']);
        $email =htmlspecialchars( $_GET['email']);
        $password = htmlspecialchars($_GET['password']);
        $passwordConfirmation = htmlspecialchars($_GET['passwordConfirmation']);
        $password = md5($password);
        $passwordConfirmation = md5($passwordConfirmation);
        $_SESSION['name'] = $name; 
        $_SESSION['email'] = $email; 

        $regexText = '/^[a-zA-Z0-9-ÿ\s]{2,20}$/';
        $regexEmail = '/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.%-]+\.[a-zA-Z]{2,}$/';


        $tabChecking = ['name','email','password','passwordConfirmation'];
         $_SESSION['errorArray'] = [];
        $error = false;

        foreach($tabChecking as $check){
           
           
            if(trim(empty($_GET[$check]) ) ){
                $error = true;
                 $_SESSION['errorArray'][] = "Vous avez entrer des espaces vides dans $check";
            }
            else if(strlen($_GET[$check]) < 2){
                $error = true;
                 $_SESSION['errorArray'][] = "Enter un minimum de 2 caractères dans le champs $check";
            }
        }

        if(!preg_match($regexText, $name)) {
            $error = true;
            $_SESSION['errorArray'][]= "Format du champ nom invalide";
        }else if(!preg_match($regexEmail, $email) or !filter_var($email, FILTER_VALIDATE_EMAIL) ){
            $error = true;
            $_SESSION['errorArray'][]= "Format du champ mail invalide";
        }else if($password != $passwordConfirmation  || strlen($password) < 8){
            $error = true;
            $_SESSION['errorArray'][]= "Les mots de passe ne sont pas identique ou inférieur à 8 caractères";
        }

        if($error) {
            
            header("Location: ".$_SERVER["HTTP_REFERER"]);
            
            die();
        }else{
            $stmt = $bdd->prepare("SELECT * FROM users WHERE userEmail = :userEmail ");

            $stmt ->bindParam(':userEmail',$email);
            $stmt ->execute();
            $row = $stmt->fetchAll();
           
        //    print_r(count($row)); die();
            
            if(count($row) != 0){
                $error = true;
                $_SESSION['errorArray'][]= "Cette address email est déjà utilisée";
                header("Location: ".$_SERVER["HTTP_REFERER"]);
                
            }else{
                $statu = 1;
                $deletable = 0;
                $stmt = $bdd ->prepare("INSERT INTO users (userNom, userEmail, userPassword, statu, deletable) 
                VALUES(:userNom, :userEmail, :userPassword, :statu, :deletable) ");
               
                $stmt ->bindParam(':userNom',$name, PDO::PARAM_STR);
                $stmt ->bindParam(':userEmail',$email, PDO::PARAM_STR);
                $stmt ->bindParam(':userPassword',$password, PDO::PARAM_STR);
                $stmt ->bindParam(':statu',$statu, PDO::PARAM_INT);
                $stmt ->bindParam(':deletable',$deletable, PDO::PARAM_INT);

                $stmt ->execute() or  die(print_r($sql->errorInfo()));

                unset($_SESSION['name']);
                unset($_SESSION['email']);
                
                
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
        
    }

?>
</body>
</html>