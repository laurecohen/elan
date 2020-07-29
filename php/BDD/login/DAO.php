<?php
    /**
     * Créer un objet PDO
     */
    function connect() :PDO
    {
        try{
            $user = "root";
            $pass = "root";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            $pdo = new PDO('mysql:host=localhost;dbname=user;charset=utf8', $user, $pass, $options);    
            return $pdo;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }