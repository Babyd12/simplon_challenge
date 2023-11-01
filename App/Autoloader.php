<?php
/**
 * @var Info this autoloader / Remplacez les espaces de noms par des répertoires et Inclue le fichier correspondant
 */
// spl_autoload_register( function($classe){
// $class = str_replace ('\\', DIRECTORY_SEPARATOR, $classe);
// require_once __DIR__.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR. $class.'.php';
// } );


spl_autoload_register(function ($class) {
    // Convertir l'espace de noms en chemin
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    
    // Construire le chemin complet vers le fichier
    $filePath = __DIR__. DIRECTORY_SEPARATOR. $classPath . DIRECTORY_SEPARATOR . $classPath . '.php';
    // $filePath = __DIR__ . DIRECTORY_SEPARATOR . basename(__DIR__). $classPath . '.php';
    
    // var_dump($filePath);
    // Inclure le fichier si celui-ci existe
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});
