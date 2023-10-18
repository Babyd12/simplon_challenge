<?php 
    session_start();
    include '../config.php';
    //include 'exe_singup.php';

    if(isset($_GET['sendlogin'])){
       
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
                        
            $req = 'SELECT * FROM users WHERE emailUser = "'.$email.'" AND passwordUser = "'.$password.'" ';
            $exe = $bdd->query($req);
            $row = $exe->rowCount();
            if($row == 0){

                $_SESSION['errorArray'][]= 'Email ou Mot de passe incorrect';
                header("Location: ".$_SERVER["HTTP_REFERER"]);
                die();

            }else if($row != 0){

                $line = $exe->fetch(PDO::FETCH_ASSOC);
                extract($line);
                $email = $line['emailUser'];
                $nom = $line['nomUser'];
                $_SESSION['userActif'] = $email;
                $_SESSION['nomUserActif'] = $nom;
                $_SESSION['wellcome'] = true;

                //ne pas oublier de vider la session 
                unset($_SESSION['email']);
                header('location: ../pages');
            }

        }

    }else{
        $error = true;
        $_SESSION['errorArray'][]= "The requested URL was not found on this server--> informer un administrateur";
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

?>