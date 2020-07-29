<?php
session_start();
require "DAO.php";

if(!empty($_POST)){
    $username = filter_input(INPUT_POST, 'login_username', FILTER_VALIDATE_REGEXP, [
        "options" => ["regexp" => "/^[a-zA-Z0-9]{4,32}/"]
    ]);
    $password = filter_input(INPUT_POST, 'login_password', FILTER_SANITIZE_STRING);

    if($username && $password){
        $pdo = connect();
        
        try{
            $stmt = $pdo->query("SELECT * FROM user");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            foreach($users as $user){
                if ($username === $user['username'] && password_verify($password, $user['password'])){
                    $_SESSION['success'] = "Connexion de ".$user['username']." réussie !";
                    header("Location:home.php");
                    die();
                } 
                else $_SESSION['error'] = "Mauvais login-mdp !";
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
else $_SESSION['error'] = "Vous n'avez pas soumis le formulaire, petit malin !";

header("Location:form_register.php");
die();