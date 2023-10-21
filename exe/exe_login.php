<?php 
    session_start();
    include '../config.php';
    //include 'exe_singup.php';

    if(isset($_GET['send_login'])){
       
        $email = $_GET['email'];
        $password = md5($_GET['password']);

        $regexEmail = '/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.%-]+\.[a-zA-Z]{2,}$/';
        $_SESSION['errorArray']=[];
        $error = false;
        $_SESSION['email'] = $email; 

        if(!preg_match($regexEmail, $email) ){     
            $error = true;
            $_SESSION['errorArray'][] = 'Format Email incorrect';
        }

        if($error){
            header("Location: ".$_SERVER["HTTP_REFERER"]);
            die();
        }else{

         
            // $stmt = $bdd ->prepare("SELECT * FROM users WHERE userEmail = :userEmail AND userPassword = :userPassword  ");
            // $stmt-> bindParam(':userEmail', $email,PDO::PARAM_STR);
            // $stmt-> bindParam(':userPassword', $password,PDO::PARAM_STR);
            // $stmt->execute();
            // $row = $stmt->fetchAll();

            $stmt = $bdd->prepare("SELECT * FROM users WHERE userEmail = :userEmail AND userPassword = :userPassword");

            $stmt ->bindParam(':userEmail',$email);
            $stmt ->bindParam(':userPassword',$password);
            $stmt ->execute();
            $row = $stmt->fetchAll();
            //  print_r($row[0]['userId']);  die();
            if(count($row) == 0){

                $_SESSION['errorArray'][]= 'Email ou Mot de passe incorrect';
                header("Location: ".$_SERVER["HTTP_REFERER"]);
                die();

            }else{
                //echo $row[0]['userNom']; die();
                $_SESSION['userActif'] = $email;
                 $_SESSION['userId'] = $row[0]['userId'];
                $_SESSION['nomUserActif'] =$row[0]['userNom'];
                $_SESSION['welcome'] = true;

                //ne pas oublier de vider la session 
                unset($_SESSION['email']);
                header('location:../pages/home.php');
                die();
            }

        }

    }else{
        $error = true;
        $_SESSION['errorArray'][]= "The requested URL was not found on this server--> informer un administrateur";
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

?>