<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p id="message">
        <?php
            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
        ?>
    </p>
    <div>
        <?php
            require "DAO.php";
            $pdo = connect();
            $stmt = $pdo->query("SELECT * FROM user");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
    </div>
    <a href="form_register.php">S'inscrire</a>
    <a href="form_login.php">Se connecter</a>
</body>
</html>