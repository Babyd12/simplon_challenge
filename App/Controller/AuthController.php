<?php 
 session_start(); 
require_once dirname(dirname(__DIR__)).'\utile.php';
require ROOT.DS.'App'.DS.'App.php';
define('LOGIN_PATH','../../App/View/Auth/login.php');
require 'Autoloader.php';

class AuthController {
       
   
    
    public function processLoginForm(){ 
       
        $bdd = App::getInstance()->getConnexion();

        if(isset($_GET['page'])){

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
                header("Location: ".LOGIN_PATH);
                die();
            }else{
                            
                $req = 'SELECT * FROM users WHERE emailUser = "'.$email.'" AND passwordUser = "'.$password.'" ';
                $exe = $bdd->query($req);
                $row = $exe->rowCount();
                if($row == 0){
    
                    $_SESSION['errorArray'][]= 'Email ou Mot de passe incorrect';
                    header("Location: ".LOGIN_PATH);
                    die();
    
                }else if($row != 0){
                
                    $line = $exe->fetch(PDO::FETCH_ASSOC);
                    extract($line);
                    $email = $line['emailUser'];
                    $nom = $line['nomUser'];
                    $GLOBALS['userName']    = $nom;
                    $GLOBALS['userEmail']   = $email;
                    // $_SESSION['userActif']
                    $_SESSION['nomUserActif']  = $nom;
                    $_SESSION['welcome'] = true;
    
                    //ne pas oublier de vider la session 
                    unset($_SESSION['email']);  
                    header('location: ../../index.php');
                }
    
            }
    
        }else{
       
            $error = true;
            $_SESSION['errorArray'][]= "The requested URL was not found on this server--> informer un administrateur";
            header("Location: ".LOGIN_PATH);
        }
    }
    public function processLogout(){
        $_SESSION = [];
        unset($_SESSION['userActif']);
        header('location: '.LOGIN_PATH);
    }
}
    

?>