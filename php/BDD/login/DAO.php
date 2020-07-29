<?php
    /**
     * fonction qui créé un objet PDO
     */
    function connect() :PDO
    {
        try{
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            $pdo = new PDO('mysql:host=localhost:3306;dbname=user',
                            'root',
                            '', $options);
        
            return $pdo;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
    