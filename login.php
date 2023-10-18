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
            <div class="contenaire_head">
                <h1>Connexion</h1>
                <h4>Votre chauffeur en un clic !</h4>
            </div>
        <div class="fb_login_btn">Continuer avec Facebook</div>
        
        <div class="after_head">
            <div class="traigh_ligne"></div>
            <p>ou</p> 
            <div class="traigh_ligne1"></div>
        </div>

        <form action="exe/exe_login.php" method="get" class="login">
           
            <div class="filling_form">
                <div class="form">
                    <label for="emal" class="labl">EMAIL</label>
                    <input type="email" name="email" value="<?php echo (!empty($_SESSION['email']) ? $_SESSION['email'] : ''  ) ?> " >
                </div>

                <div class="form">
                    <label for="password">MOT DE PASSE</label>
                    <input type="password" name="password" id="" >
                    <div class="icons">
                        <img src="image/icons/eye.png"/>
                    </div>               
                </div>
            </div>

            <div class="contenair_foot">
                        <input type="submit" value="Se Connecter" name="sendlogin" style=" width: 100%;" >
                    <div class="icons">
                        <img src="image/icons/arrow1.png"/>           
                    </div>
               </div>
        </form>
        

            <div class="card_create_account"><p><a href="singup.php">Créer un compte</a></p></div>
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