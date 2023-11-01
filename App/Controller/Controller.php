<?php
//  require 'Autoloader.php';
require_once 'AuthController.php';
;

class Controller {

    protected $authentification;

    public function authController(){
    $this -> authentification =   new AuthController();
    $this -> authentification -> processLoginForm();
    
    }

    public function logout(){
        $this -> authentification =   new AuthController();
        $this -> authentification -> processLogout();
    }

    // public function singUpController(){
    //     $this -> authentification = new singUpController();
    //     $this -> authentification -> processSingUp();

    //     $this -> authentification = ControllerFactory::creat('singUpController');
    // }




}

