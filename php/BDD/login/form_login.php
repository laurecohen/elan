<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION</title>
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
            <label for="user">E-mail ou pseudo</label>
            <input type="text" name="user" required>
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" minlength="8" required>
        </p>
        <p>  
            <input type="submit" value="Connexion">
        </p>
    </form>
</body>
</html>