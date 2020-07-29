<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
</head>
<body>
    <p id="message">
        <?php
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
    </p>
    <form action="login.php" method="post">
        <p>
            <label for="login_username">Pseudo</label>
            <input type="text" id="login_username" name="login_username" required>
        </p>
        <p>
            <label for="login_password">Mot de passe</label>
            <input type="password" id="login_password" name="login_password" minlength="8" required>
        </p>
        <p>  
            <input type="submit" value="Se connecter">
        </p>
    </form>
</body>
</html>