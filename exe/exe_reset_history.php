<?php
session_start();
/*MobSpyco 2002% */
if(isset($_GET['reset_action']) && empty($_GET['amound']) && isset($_SESSION['date_history']))
{   
    session_unset();
    header("Location: " .$_SERVER['HTTP_REFERER'] );
}
elseif( isset($_GET['reset_one']) && !empty($_GET['reset_selected']) )
{

    $date_to_remove = $_GET['reset_selected'];
    unset($_SESSION['global_merge_data'][$date_to_remove]);   
    
// Suppression de la date dans le tableau historique et celui val(valeur entrer par user)
if (isset($_SESSION['date_history']) && is_array($_SESSION['date_history'])) {
    //$dateToDelete = "2023-10-12";  // La date à supprimer
    foreach ($_SESSION['date_history'] as $key => $entry) {
        if (isset($entry['date']) && $entry['date'] == $date_to_remove) {
            unset($_SESSION['date_history'][$key]);
        }else{
            echo "brooooo";
        }
    }
}
if (isset($_SESSION['val']) && is_array($_SESSION['val'])) {
    //$dateToDelete = "2023-10-12";  // La date à supprimer
    foreach ($_SESSION['val'] as $key => $entry) {
        if (isset($entry['date']) && $entry['date'] == $date_to_remove) {
            unset($_SESSION['val'][$key]);
        }else{
            echo "broo 22";
        }
    }
}


    header("Location: " .$_SERVER['HTTP_REFERER'] );
  
}
else
{
    echo "nothing geted ";
    header("Location: " .$_SERVER['HTTP_REFERER'] );
}

?>