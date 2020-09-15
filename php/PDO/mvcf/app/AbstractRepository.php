<?php
    namespace App;

    abstract class AbstractRepository{

        protected static $pdo;

        const DB_HOST = "127.0.0.1:3306";
        const DB_NAME = "apero";
        const DB_USER = "root";
        const DB_PASS = "";

        protected static function connect(){

            //connexion à la BDD
            try{
                self::$pdo = new \PDO(
                    'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME,
                    self::DB_USER,
                    self::DB_PASS,
                    [
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                    ]
                );
            }
            catch(\Exception $e){
                echo $e->getMessage();
                die();
            }
        }

        protected static function executeQuery($sql, $params = null, $multiple = true){
            
            if($params !== null){
                $stmt = self::$pdo->prepare($sql);
                $stmt->execute($params);
            }
            else $stmt = self::$pdo->query($sql);
            
            $results = $multiple ? $stmt->fetchAll() : $stmt->fetch();
            $stmt->closeCursor();

            return $results;
        }

        protected static function fetchResults($resultArray, $className){
            
            if($resultArray){
                if(isset($resultArray[0]) && is_array($resultArray[0])){
                    $objects = [];
                    foreach($resultArray as $array){
                        $objects[] = new $className($array);
                    }
                }
                else $objects = new $className($resultArray);
                
                return $objects;
            }
            return false;
        }
    }