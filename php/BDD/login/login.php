<?php
    session_start();

    require "DAO.php";

    if(!empty($_POST)){
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if($user && $password){
            $pdo = connect();

            $stmt = $pdo->prepare("SELECT username, email, password FROM user WHERE email = :user OR username = :user");
            $stmt->execute(['user' => $user]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $user['password'])){
                $_SESSION["user"] = $user;
                $_SESSION["success"] = "Bienvenue ".$user['username']." !";
                header("Location: index.php");
                die();
            }
            else $_SESSION['error'] = "Le nom d'utilisateur ou le mot de passe est incorrect !";
        }
        else $_SESSION['error'] = "Les champs obligatoires ne sont pas tous remplis !";
    }
    else $_SESSION['error'] = "Vous n'avez pas soumis le formulaire, petit malin !";

    header("Location:form_login.php");
    die();