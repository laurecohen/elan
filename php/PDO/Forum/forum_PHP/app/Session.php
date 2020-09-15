<?php
    namespace App;

    abstract class Session{
        public static function addUser($user){
            $_SESSION['user'] = $user; 
        }

        public static function getUser(){
            return (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
        }

        public static function hasUser(){
            return (self::getUser() !== null) ? true : false;
        }

        public static function isAdmin(){
            if(self::hasUser()){
                $roles = json_decode(self::getUser()->getRole());
                
                if(in_array("ROLE_ADMIN", $roles)){
                    return true;
                }
            }
        }

        public static function deconnect(){
            unset($_SESSION['user']);
        }

        public static function addMessage($type, $text){
            if(!isset($_SESSION['msg'][$type])){
                $_SESSION["msg"][$type] = [];
            }
            
            $_SESSION['msg'][$type][] = $text;
        }

        public static function getValuesOf($index){
            return isset ($_SESSION[$index]) ? $_SESSION[$index] : false;
        }

        public static function hasMessages(){
            return isset($_SESSION["msg"]);
        }

        public static function getMessage($type){
            
            if(isset($_SESSION["msg"][$type])){
                $msgs = $_SESSION["msg"][$type];
                unset($_SESSION["msg"][$type]);
                return $msgs;
            }
            else return [];
        }
    }