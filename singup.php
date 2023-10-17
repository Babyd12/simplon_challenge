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
            <h1>Bienvenu</h1>
            <h4>Finaliser votre information en remplissant les informations manquantes</h4>
        </div>


        <form action="exe/exe_singup.php" method="get" class="info_form">
           

            
            <div class="filling_form">
                <div class="form">
                    <label for="emal" class="labl">NOM</label>
                    <input type="text" name="emamil" id="">
                </div>
    
    
                <div class="form">
    
                    <label for="password">PRENOM</label>
                 
                    <input type="text   " name="psw" id="" >
                   
                </div>
            </div>

            <div class="filling_form">
                <div class="form">
                    <label for="emal" class="labl">EMAIL</label>
                    <input type="email" name="emamil" id="">
                </div>
    
    
                <div class="form">
    
                    <label for="password">MOT DE PASSE</label>
                 
                    <input type="password" name="psw" id="" >
                    <div class="icons">
                        <img src="image/icons/eye.png"/>
                    </div>
                   
                </div>
            </div>


            <div class="form">
                <label for="password" class="phone">TELEPHONE</label>
             
                <input type="tel" name="psw" id="" placeholder="   78 444 52 35" >
                <P> +77</P>
                <div class="icons_drapeau">
                    <img src="image/icons/senegal.png"/>
                </div>        
            </div>

            
        </form>

            <div class="card_create_account"><p><a href="login.php">J'ai déjà un compte</a></p></div>
        </div>

    </div>
</body>
</html>