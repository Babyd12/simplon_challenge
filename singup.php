<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de tâche</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="ressources/css/style.css">
</head>
<body>
    <header>
        <h1>Inscription à MigiWara Task Manager</h1>
        <nav>
            
        </nav>
    </header>

    <div id="container" >
        <h2>Création de compte</h2>

        
        <div class="row1">
            <label class="label">Nom Complet</label>
            <input type="text" name="name" id="">
        </div>

        <div class="row1">
            <label class="label">Email :</label>

            <input type="email" name="email" id="">
        </div>
        
        <div class="row1">
            <label class="label">Mot de passe :</label>
            <i class="bi bi-eye-slash" id="togglePassword" onclick="togglePasswordVisibility()">  </i>
            <input type="password" name="password" id="passwordInput" />     
        </div>
        
        <div class="row1">
            <label class="label">Confirmation mot de passe</label>
            <input type="text" name="password1" id="passwordInput1">
            <i class="bi bi-eye-slash" id="togglePassword1" onclick="togglePasswordVisibility1()">  </i>

        </div>

        <div class="row2">
            <P><a href="">Mot de passe oublié ?</a></P>
            <P><a href="">Se connecter</a></P>
        </div>

        <input type="submit" value="Créer un compte" name="send">
        
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("passwordInput");
            var togglePassword = document.getElementById("togglePassword");
        
            if (passwordInput.type === "password") {
                passwordInput.type = "text"; // Afficher le mot de passe
                togglePassword.className = "bi bi-eye"; // Changer l'icône en "œil ouvert"
            } else {
                passwordInput.type = "password"; // Masquer le mot de passe
                togglePassword.className = "bi bi-eye-slash"; // Changer l'icône en "œil fermé"
            }
        }

        function togglePasswordVisibility1() {
            var passwordInput = document.getElementById("passwordInput1");
            var togglePassword = document.getElementById("togglePassword1");
        
            if (passwordInput.type === "password") {
                passwordInput.type = "text"; // Afficher le mot de passe
                togglePassword.className = "bi bi-eye"; // Changer l'icône en "œil ouvert"
            } else {
                passwordInput.type = "password"; // Masquer le mot de passe
                togglePassword.className = "bi bi-eye-slash"; // Changer l'icône en "œil fermé"
            }
        }
    </script>

</body>
</html>