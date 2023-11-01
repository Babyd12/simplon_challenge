<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__). DS.'contactManager');
define('APP', ROOT.DS.'App');
define('VIEW', ROOT.DS.'App'.DS.'View');



function browse($array = array()) {
    foreach ($array as $value){
        echo $value;
    }
}

/*Variables globals */

// $GLOBALS['userActif'];
// $GLOBALS['userName'];
// $GLOBALS['userEmail'];

