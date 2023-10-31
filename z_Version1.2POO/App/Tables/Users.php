<?php 
 
   namespace App;
   

    class Users{
       
        public static function  getAllUsers(){
            // $className = strtolower(get_called_class());
            $datas = App::getInstance()->queryStatement('SELECT * FROM users', __CLASS__); //App\Tables\Users
            return $datas;
        }
    }
  

?>