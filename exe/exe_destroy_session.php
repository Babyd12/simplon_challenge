<?php 

class DestroySession{


    
    public static function Destroyer(){
        
        if(isset($_GET['sess'])){
           
            $_SESSION = array();
            session_destroy();
            header('location: ../../index.php');
        }else{
            echo "UNKNOWN FORM";
        }
    }
}

?>