<?php
    namespace App;

    abstract class Session {

        public static function addFavorite($value){
            if(!isset($_SESSION['favorites'])){
                $_SESSION["favorites"] = [];
            }
            if(!in_array($value, $_SESSION['favorites'])){
                $_SESSION['favorites'][] = $value;
                self::addMessage("success", "Boisson ".$value->getNom()." bien enregistrée !");
            }
            else self::addMessage("error", "Cette boisson est déjà présente dans vos favoris !");
            
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