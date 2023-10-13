<?php 
/*After rebase */
function isSafeInputs($input) {
    // Utilisez une expression régulière pour rechercher des caractères spéciaux non autorisés
    $pattern = '/[\'"\/<>,.*]+/';   
    return preg_match($pattern, $input);
}
?>