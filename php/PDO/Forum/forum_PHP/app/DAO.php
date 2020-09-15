<?php
    namespace App;

    abstract class DAO {
        
        const DB_HOST = "127.0.0.1:3306";
        const DB_NAME = "forumdl8";
        const DB_USER = "root";
        const DB_PASS = "";

        public static function getConnection(){

            //connexion à la BDD
            try{
                $pdo = new \PDO(
                    'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8',
                    self::DB_USER,
                    self::DB_PASS,
                    [
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                    ]
                );
                return $pdo;
            }
            catch(\Exception $e){
                echo $e->getMessage();
                die();
            }
        }
    }