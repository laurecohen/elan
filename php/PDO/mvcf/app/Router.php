<?php
    namespace App;

    abstract class Router {

        public static function handleRequest($url){
            
            $ctrlname = "Controller\HomeController";
            $action = "index";
            $id = null;
            
            if(isset($url['ctrl'])){
                $ctrlname = "Controller\\".ucfirst($url['ctrl'])."Controller";
            }
            
            $ctrl = new $ctrlname();

            if(isset($url['action']) && method_exists($ctrl, $url['action'])){
                $action = $url['action'];
            }

            if(isset($url['id'])){
                $id = $url['id'];
            }
            
            return $ctrl->$action($id);
        }

        public static function redirectTo($ctrl, $method = null, $id = null){
            header("Location:?ctrl=$ctrl&action=$method&id=$id");
            die();//mettre fin à l'exécution du code restant
        }
    }