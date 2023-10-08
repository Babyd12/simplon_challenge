<?php



// echo $_SESSION['hour_init'] = time();
//echo date("Y-m-d H:i:s ", $_SESSION['date_init']);
   // echo date("Y-m-d", $_SESSION['date_init']);
//$test1 =  date("Y-m-d ", $_SESSION['date_of_daty']);

$timestamp = time();
$timestamp; // Affiche le timestamp Unix actuel


function isDifferentDay() {
   $_SESSION['date_of_day'] =  time();
   //" <br> " .date("Y-m-d H:i:s", $_SESSION['date_of_day']); /*format of the date in Year Month Day Hour   */

    //$_SESSION['date_of_day'] =  addDaysTodate("2", date("Y-m-d ", $_SESSION['date_of_day']) );
    //$_SESSION['date_of_day'] = strtotime( $_SESSION['date_of_day'] );
   

    if( date("Y-m-d ", $_SESSION['date_init']) == date("Y-m-d ", $_SESSION['date_of_day']) ){
        echo "egal days";
        return false;
    }
    else if( date("Y-m-d ", $_SESSION['date_init']) !== date("Y-m-d ", $_SESSION['date_of_day']) ) {
        echo"different days";

        return true; 
    }
}


//isDifferentDay();

function displayCurrentTime(){
    date_default_timezone_set('Africa/Monrovia');
    $r = displayDateInFrench()." ".date('H:i:s');
    return  $r;
}
// displayCurrentTime();




//$jour = getdate();
//print_r(getdate());
function displayDateInFrench(){
    $weak = array(
        " Dimanche ", " Lundi ", " Mardi ", " Mercredi ", " Jeudi ",
        " vendredi ", " samedi "
    );
    $month = array(
        1 => " janvier ", " février ", " mars ", " avril ", " mai ", " juin ",
        " juillet ", " août ", " septembre ", " octobre ", " novembre ", " décembre "
    );
    
    
    // Avec date()
    $r = $weak[date('w')] . " " . date('j') . " " . $month[date('n')] . date('Y');
    return $r;
    
}

//displayDateInFrench();

function addDaysTodate($dayAdded, $date){
    
    $d = strtotime('+'.$dayAdded .'day', strtotime($date) );
     $r = date('Y-m-d', $d);
    return  $r;
}
//$dayAdded = '2';
//$date = '2023-10-06';
//addDaysTodate($dayAdded, $date);

 //$d = strtotime('+1 day', strtotime('2023-10-06'));



/*

// Liste des fuseaux horaires disponibles
$timezones = timezone_identifiers_list();

// Afficher la liste des fuseaux horaires pour détermination
foreach ($timezones as $timezone) {
    echo $timezone . '<br>';
}

// Définir le fuseau horaire approprié (par exemple, pour Paris)
date_default_timezone_set('Africa/Monrovia');

// Obtenir l'heure locale
$heure = date('H:i:s');
echo "L'heure du jour est : " . $heure;

*/
 
 










/*
//Set the session timeout for 2 seconds
$timeout = 2;

//Set the maxlifetime of the session
ini_set( "session.gc_maxlifetime", $timeout );

//Set the cookie lifetime of the session
ini_set( "session.cookie_lifetime", $timeout );

//Start a new session
session_start();

//Set the default session name
$s_name = session_name();

//Check the session exists or not
if(isset( $_COOKIE[ $s_name ] )) {
    setcookie( $s_name, $_COOKIE[ $s_name ], time() + $timeout, '/' );

    echo "Session is created for $s_name.<br/>";
} else {
    echo "Session is expired.<br/>";
}

$jour = getdate();
//print_r(getdate());
$semaine = array(
    " Dimanche ", " Lundi ", " Mardi ", " Mercredi ", " Jeudi ",
    " vendredi ", " samedi "
);
$mois = array(
    1 => " janvier ", " février ", " mars ", " avril ", " mai ", " juin ",
    " juillet ", " août ", " septembre ", " octobre ", " novembre ", " décembre "
);


// Avec date()
echo ": Aujourd'hui ",
$semaine[date('w')], " ", date('j'), "", $mois[date('n')], date('Y'), "
";

*/






?>

