<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul class="menu">
          <li><a href="#!">Home</a></li>
          <li><a href="#!">About</a></li>
          <li><a href="#!">Contact</a></li>
          <li><a href="#!">Faq</a></li>
        </ul>
      </nav>
    <div id="contenair">   
        <div class="contenaire_head_sing_up">
            <h1>Bienvenu</h1>
            <h4>Finaliser votre information en remplissant les informations manquantes</h4>
        </div>


        <form action="exe/exe_singup.php" method="get" class="info_form">
            
            <div class="filling_form">
                <div class="form">
                    <label for="emal" class="labl">NOM</label>
                    <input type="text" name="nom" value="<?php echo (!empty($_SESSION['nom']) ? $_SESSION['nom'] : '' ); ?>"   >
                </div>
    
    
                <div class="form">
    
                    <label for="password">PRENOM</label>
                 
                    <input type="text" name="prenom" value="<?php echo (!empty($_SESSION['prenom']) ? $_SESSION['prenom'] : '' ); ?>"  >
                   
                </div>
            </div>

            <div class="filling_form">
                <div class="form">
                    <label for="emal" class="labl">EMAIL</label>
                    <input type="email" name="email" value="<?php echo (!empty($_SESSION['email']) ? $_SESSION['email'] : '' ); ?>" >
                </div>
    
    
                <div class="form">
    
                    <label for="password">MOT DE PASSE</label>
                 
                    <input type="password" name="pswd"  >
                    <div class="icons">
                        <img src="image/icons/eye.png"/>
                    </div>


                    <label for="password">CONFIRMER LE MOT DE PASSE</label>
                 
                 <input type="password" name="pswd2"  >
                 <div class="icons">
                     <img src="image/icons/eye.png"/>
                 </div>
                   
                </div>



            </div>


            <div class="form">
                <label for="password" class="phone">TELEPHONE</label>
             
                <input type="tel" name="tel" value="<?php echo (!empty($_SESSION['tel']) ? $_SESSION['tel'] : '' ); ?>"   >
                <P> +221</P>
                <div class="icons_drapeau">
                    <img src="image/icons/senegal.png"/>
                </div>        
            </div>
            <div class="contenair_foot">
                
                <input type="submit" value="S'inscire" name="send" style=" width: 100%;" >
                
                <div class="icons">
                    <img src="image/icons/arrow1.png"/>    
                </div>
            </div>      

        </form>     

            <div class="card_create_account"><p><a href="login.php">J'ai déjà un compte</a></p></div>
        </div>

        <div class="msgError">
            <?php   if(!empty($_SESSION['errorArray'])){
                        foreach($_SESSION['errorArray'] as $errorMsg){
                            echo "<p> Erreur: $errorMsg </p>";
                        }
                        unset($_SESSION['errorArray']);
                    }
            ?>
          
        </div>
    </div>
            
</body>
</html>