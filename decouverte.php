<?php 

//je veux afficher echo hello cest encore moi après chaque 30 seconde en php

while (true) {
    echo "Hello, c'est encore moi<br>";
    ob_flush();
    flush();
    sleep(30); // Attendre 30 secondes
}

//-------------------------------------------------------------------------------------
/*je voulais afficher le meme message apres 30 seconde mais cette fois en tenant  
compte que chaque fois que le navigateur est recharger àlors le sleep doit repartir à 0 et attendre les prochaines 30 secondes */


session_start();

// Vérifier si la variable de session "last_display_time" existe
if (isset($_SESSION['last_display_time'])) {
    // Calculer le temps écoulé depuis la dernière fois
    $elapsed_time = time() - $_SESSION['last_display_time'];

    // Si plus de 30 secondes se sont écoulées, afficher le message
    if ($elapsed_time >= 30) {
        echo "Hello, c'est encore moi";
        
        // Mettre à jour le temps de la dernière affichage
        $_SESSION['last_display_time'] = time();
    }
} else {
    // Si la variable de session "last_display_time" n'existe pas, la créer
    $_SESSION['last_display_time'] = time();
}

// Attendre quelques secondes avant de rafraîchir la page
sleep(5);

// Rediriger vers la page actuelle pour provoquer un rechargement
header("Location: " . $_SERVER['PHP_SELF']);



?>