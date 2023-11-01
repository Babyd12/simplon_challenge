<?php
class ControllerFactory {
    public static function createController($controllerName) {
        switch ($controllerName) {
            case 'AuthController':
                return new AuthController();
            // Ajoutez d'autres cas pour d'autres contrôleurs si nécessaire
            default:
                return null;
        }
    }
}
